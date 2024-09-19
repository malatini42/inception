# Project specs
### IDE Live Templates
* configclass - PHP Class for Registering Customizer Configuration

### Setup Accordion UI Settings API
array(
    'id' => 'for_utilities_wrapper_name_section',
    'control_type' => 'Inspiro_Customize_Accordion_UI_Control',
    'args' => array(
    'label'    	=> __( 'Header name', 'inspiro' ),
    'section' 	=> 'inspiro_section_name',
    'settings'	=> array(), // empty array() for not using settings setup and trigger rendering
    'controls_to_wrap' => 6, // how many to wrapp after this tag
    ),
),

### CSS
* Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
	* define( 'SCRIPT_DEBUG', true );


# Development tools updates
* Updating packages and the Gruntfile to address issues caused by outdated dependencies.
  * update to node: 'v18.19.1' and npm: '10.2.4'


# Upgrade details

v. 1.9.0
### Design
* Implement icons in main scss file

### CSS improvements
* Eliminate overqualified elements like li and h3

### Fixes
* Update to last npm packages
* Uninstall 'postcss-flexibility' package because no need support for IE 9 & 8 versions.

# TODO
* Test/ask if *.css styles are ok after new updates and minor changes in files.
* Fix all Grunt sass warnings
* Delete commented deactivated packages in Grunt file after all tests.


