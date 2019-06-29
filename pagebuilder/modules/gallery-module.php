<?php 
$output = 
'<div {{if_id}}id="{{id}}"{{ifend_id}} class="amp-gallery-mod {{user_class}}">
	<div class="amp_gallery_wrapper">{{repeater}}</div>
</div>
';
$commoncss = '';
$css = '
.gal-mod{text-align:{{align_type}};padding:{{padding_css}};margin:{{margin_css}};}
.gallery{text-align:{{align_type}};padding:{{padding_css}};margin:{{margin_css}};}
{{module-class}} .amp_gallery_wrapper amp-img{max-width:{{width}};margin:0 2% 15px 2%;display: inline-block;vertical-align: middle;width:100%;}
';
return array(
		'label' =>'Logo',
		'name' =>'gallery',
		'default_tab'=> 'customizer',
		'tabs' => array(
              'customizer'=>'Content',
              'design'=>'Design',
              'advanced' => 'Advanced'
            ),
		'fields' => array(
						array(		
		 						'type'		=>'text',		
		 						'name'		=>"width",		
		 						'label'		=>'Width',
		           				 'tab'      =>'customizer',
		 						'default'	=>'500px',	
		           				'content_type'=>'css',
	 						),
	 					array(		
	 							'type'	=>'select',		
	 							'name'  =>'align_type',		
	 							'label' =>"Align",
								'tab'     =>'design',
	 							'default' =>'center',
	 							'options_details'=>array(
	 												'center'    =>'Center',
	 												'left'  	=>'Left',
	 												'right'    =>'Right', 													),
	 							'content_type'=>'css',
	 						),
 						array(
							'type'		=>'text',
							'name'		=>"id",
							'label'		=>'ID',
							'tab'		=>'advanced',
							'default'	=>'',
							'content_type'=>'html'
						),
						array(
								'type'		=>'text',
								'name'		=>"user_class",
								'label'		=>'Class',
								'tab'		=>'advanced',
								'default'	=>'',
								'content_type'=>'html'
							),	
						array(
								'type'		=>'spacing',
								'name'		=>"margin_css",
								'label'		=>'Margin',
								'tab'		=>'advanced',
								'default'	=>
                            array(
                                'top'=>'20px',
                                'right'=>'auto',
                                'bottom'=>'20px',
                                'left'=>'auto',
                            ),
								'content_type'=>'css',
							),
							array(
								'type'		=>'spacing',
								'name'		=>"padding_css",
								'label'		=>'Padding',
								'tab'		=>'advanced',
								'default'	=>array(
													'left'=>'0px',
													'right'=>'0px',
													'top'=>'0px',
													'bottom'=>'0px'
												),
								'content_type'=>'css',
							),

			),
		'front_template'=> $output,
		'front_css'=> $css,
		'front_common_css'=>'',
		'repeater'=>array(
          'tab'=>'customizer',
          'fields'=>array(
		                array(		
	 						'type'		=>'upload',		
	 						'name'		=>"img_upload",		
	 						'label'		=>'Image',
	           				'tab'     =>'customizer',
	 						'default'	=>'',	
	           				'content_type'=>'html',
 						),
 						array(		
	 						'type'		=>'text',		
	 						'name'		=>"img_link",		
	 						'label'		=>'Image Link',
	           				'tab'     =>'customizer',
	 						'default'	=>'',	
	           				'content_type'=>'html',
 						),
 						array(		
		 						'type'		=>'checkbox_bool',		
		 						'name'		=>"img_link_newtab",		
		 						'label'		=>'Open in NewTab',
		           				'tab'     	=>'customizer',
		 						'default'	=>0,
		           				'options'	=>array(
												array(
													'label'=>'Check to open the image link in new tab.',
													'value'=>1,
												),
											),
		           				'content_type'=>'html',
	 					),
 						array(
								'type'		=>'checkbox',
								'name'		=>"image_layout",
								'tab'		=>'design',
								'default'	=>array('responsive'),
								'options'	=>array(
												array(
													'label'=>'Responsive',
													'value'=>'responsive',
												),
											),
								'content_type'=>'html',
							),
              ),
          'front_template'=>'{{if_img_upload}}{{if_img_link}}<a href="{{img_link}}" {{if_condition_img_link_newtab==1}}target="_blank"{{ifend_condition_img_link_newtab_1}}>{{ifend_img_link}}<amp-img src="{{img_upload}}" width="{{image_width}}" height="{{image_height}}" {{if_image_layout}}layout="{{image_layout}}"{{ifend_image_layout}}  alt="{{image_alt}}"></amp-img></a>{{ifend_img_upload}}'
          ),
	);



?>