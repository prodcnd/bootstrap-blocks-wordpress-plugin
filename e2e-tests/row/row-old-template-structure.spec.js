/**
 * WordPress dependencies
 */
import {
	activatePlugin,
	deactivatePlugin,
	createNewPost,
	getEditedPostContent,
} from '@wordpress/e2e-test-utils';
import {
	insertRowBlock,
	selectRowBlock,
} from './row-helper';

describe( 'row block old template structure', () => {
	beforeAll( async () => {
		await activatePlugin( 'wp-bootstrap-blocks-test-row-old-template-structure' );
	} );

	afterAll( async () => {
		await deactivatePlugin( 'wp-bootstrap-blocks-test-row-old-template-structure' );
	} );

	beforeEach( async () => {
		await createNewPost();
	} );

	it( 'Should warn if old template structure is used', async () => {
		const expectedMsg = 'wp-bootstrap-blocks: The old object template structure (<= v1.2.0) of the row block is deprecated, please migrate your templates to the new array structure (v1.3.0+). As soon as you have updated your template structure you need to disable the old object template structure with the wpBootstrapBlocks.row.useOldObjectTemplateStructure filter.';
		expect( console ).toHaveWarnedWith( expectedMsg );
	} );

	it( 'Custom template defined with old object structure should be available', async () => {
		await insertRowBlock();
		expect( await getEditedPostContent() ).toMatchSnapshot();
		await selectRowBlock();

		// Custom template should be available
		expect( await page.$$( '.wp-bootstrap-blocks-template-selector-button' ) ).toHaveLength( 6 );
		expect( await page.$( '.wp-bootstrap-blocks-template-selector-button > button[aria-label="1 Column (2/3 width)"]' ) ).not.toBeNull();

		// Template should be applied
		await page.click( '.wp-bootstrap-blocks-template-selector-button > button[aria-label="1 Column (2/3 width)"]' );

		expect( await getEditedPostContent() ).toMatchSnapshot();

		expect( console ).toHaveWarned();
	} );
} );
