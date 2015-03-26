<?php

if ( !function_exists('quadro_get_valid_fontslist') ) {
function quadro_get_valid_fontslist() {

	$fonts_list = array( 			
		'0' => array (
			'font-family' => 'font-family: "Courier New", Courier, monospace;',
			'font-name' => 'Courier New',
			'css-name' => 'none'
		),
		'1' => array (
			'font-family' => 'font-family: Georgia, serif;',
			'font-name' => 'Georgia',
			'css-name' => 'none'
		),
		'2' => array (
			'font-family' => 'font-family: Helvetica, Arial, sans-serif;',
			'font-name' => 'Helvetica / Arial',
			'css-name' => 'none'
		),
		'3' => array (
			'font-family' => 'font-family: Impact, Charcoal, sans-serif;',
			'font-name' => 'Impact',
			'css-name' => 'none'
		),
		'4' => array (
			'font-family' => 'font-family: "Lucida Console", Monaco, monospace;',
			'font-name' => 'Lucida Console',
			'css-name' => 'none'
		),
		'5' => array (
			'font-family' => 'font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;',
			'font-name' => 'Lucida Sans',
			'css-name' => 'none'
		),
		'6' => array (
			'font-family' => 'font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;',
			'font-name' => 'Palatino Linotype',
			'css-name' => 'none'
		),
		'7' => array (
			'font-family' => 'font-family: Tahoma, Geneva, sans-serif;',
			'font-name' => 'Tahoma',
			'css-name' => 'none'
		),
		'8' => array (
			'font-family' => 'font-family: "Times New Roman", Times, serif;',
			'font-name' => 'Times New Roman',
			'css-name' => 'none'
		),
		'9' => array (
			'font-family' => 'font-family: "Trebuchet MS", Helvetica, sans-serif;',
			'font-name' => 'Trebuchet MS',
			'css-name' => 'none'
		),
		'10' => array (
			'font-family' => 'font-family: Verdana, Geneva, sans-serif;',
			'font-name' => 'Verdana',
			'css-name' => 'none'
		),
		'11' => array (
			'font-family' => '----------------------------',
			'font-name' => '-----------------------------',
			'css-name' => '-----------------------------'
		),
		'12' => array (
			'font-family' => 'font-family: "ABeeZee";',
			'font-name' => 'ABeeZee',
			'css-name' => 'ABeeZee'
		), 
		'13' => array (
			'font-family' => 'font-family: "Abel";',
			'font-name' => 'Abel',
			'css-name' => 'Abel'
		), 
		'14' => array (
			'font-family' => 'font-family: "Abril Fatface";',
			'font-name' => 'Abril Fatface',
			'css-name' => 'Abril+Fatface'
		), 
		'15' => array (
			'font-family' => 'font-family: "Aclonica";',
			'font-name' => 'Aclonica',
			'css-name' => 'Aclonica'
		), 
		'16' => array (
			'font-family' => 'font-family: "Acme";',
			'font-name' => 'Acme',
			'css-name' => 'Acme'
		), 
		'17' => array (
			'font-family' => 'font-family: "Actor";',
			'font-name' => 'Actor',
			'css-name' => 'Actor'
		), 
		'18' => array (
			'font-family' => 'font-family: "Adamina";',
			'font-name' => 'Adamina',
			'css-name' => 'Adamina'
		), 
		'19' => array (
			'font-family' => 'font-family: "Advent Pro";',
			'font-name' => 'Advent Pro',
			'css-name' => 'Advent+Pro'
		), 
		'20' => array (
			'font-family' => 'font-family: "Aguafina Script";',
			'font-name' => 'Aguafina Script',
			'css-name' => 'Aguafina+Script'
		), 
		'21' => array (
			'font-family' => 'font-family: "Akronim";',
			'font-name' => 'Akronim',
			'css-name' => 'Akronim'
		), 
		'22' => array (
			'font-family' => 'font-family: "Aladin";',
			'font-name' => 'Aladin',
			'css-name' => 'Aladin'
		), 
		'23' => array (
			'font-family' => 'font-family: "Aldrich";',
			'font-name' => 'Aldrich',
			'css-name' => 'Aldrich'
		), 
		'24' => array (
			'font-family' => 'font-family: "Alef";',
			'font-name' => 'Alef',
			'css-name' => 'Alef'
		), 
		'25' => array (
			'font-family' => 'font-family: "Alegreya";',
			'font-name' => 'Alegreya',
			'css-name' => 'Alegreya'
		), 
		'26' => array (
			'font-family' => 'font-family: "Alegreya SC";',
			'font-name' => 'Alegreya SC',
			'css-name' => 'Alegreya+SC'
		), 
		'27' => array (
			'font-family' => 'font-family: "Alegreya Sans";',
			'font-name' => 'Alegreya Sans',
			'css-name' => 'Alegreya+Sans'
		), 
		'28' => array (
			'font-family' => 'font-family: "Alegreya Sans SC";',
			'font-name' => 'Alegreya Sans SC',
			'css-name' => 'Alegreya+Sans+SC'
		), 
		'29' => array (
			'font-family' => 'font-family: "Alex Brush";',
			'font-name' => 'Alex Brush',
			'css-name' => 'Alex+Brush'
		), 
		'30' => array (
			'font-family' => 'font-family: "Alfa Slab One";',
			'font-name' => 'Alfa Slab One',
			'css-name' => 'Alfa+Slab+One'
		), 
		'31' => array (
			'font-family' => 'font-family: "Alice";',
			'font-name' => 'Alice',
			'css-name' => 'Alice'
		), 
		'32' => array (
			'font-family' => 'font-family: "Alike";',
			'font-name' => 'Alike',
			'css-name' => 'Alike'
		), 
		'33' => array (
			'font-family' => 'font-family: "Alike Angular";',
			'font-name' => 'Alike Angular',
			'css-name' => 'Alike+Angular'
		), 
		'34' => array (
			'font-family' => 'font-family: "Allan";',
			'font-name' => 'Allan',
			'css-name' => 'Allan'
		), 
		'35' => array (
			'font-family' => 'font-family: "Allerta";',
			'font-name' => 'Allerta',
			'css-name' => 'Allerta'
		), 
		'36' => array (
			'font-family' => 'font-family: "Allerta Stencil";',
			'font-name' => 'Allerta Stencil',
			'css-name' => 'Allerta+Stencil'
		), 
		'37' => array (
			'font-family' => 'font-family: "Allura";',
			'font-name' => 'Allura',
			'css-name' => 'Allura'
		), 
		'38' => array (
			'font-family' => 'font-family: "Almendra";',
			'font-name' => 'Almendra',
			'css-name' => 'Almendra'
		), 
		'39' => array (
			'font-family' => 'font-family: "Almendra Display";',
			'font-name' => 'Almendra Display',
			'css-name' => 'Almendra+Display'
		), 
		'40' => array (
			'font-family' => 'font-family: "Almendra SC";',
			'font-name' => 'Almendra SC',
			'css-name' => 'Almendra+SC'
		), 
		'41' => array (
			'font-family' => 'font-family: "Amarante";',
			'font-name' => 'Amarante',
			'css-name' => 'Amarante'
		), 
		'42' => array (
			'font-family' => 'font-family: "Amaranth";',
			'font-name' => 'Amaranth',
			'css-name' => 'Amaranth'
		), 
		'43' => array (
			'font-family' => 'font-family: "Amatic SC";',
			'font-name' => 'Amatic SC',
			'css-name' => 'Amatic+SC'
		), 
		'44' => array (
			'font-family' => 'font-family: "Amethysta";',
			'font-name' => 'Amethysta',
			'css-name' => 'Amethysta'
		), 
		'45' => array (
			'font-family' => 'font-family: "Anaheim";',
			'font-name' => 'Anaheim',
			'css-name' => 'Anaheim'
		), 
		'46' => array (
			'font-family' => 'font-family: "Andada";',
			'font-name' => 'Andada',
			'css-name' => 'Andada'
		), 
		'47' => array (
			'font-family' => 'font-family: "Andika";',
			'font-name' => 'Andika',
			'css-name' => 'Andika'
		), 
		'48' => array (
			'font-family' => 'font-family: "Angkor";',
			'font-name' => 'Angkor',
			'css-name' => 'Angkor'
		), 
		'49' => array (
			'font-family' => 'font-family: "Annie Use Your Telescope";',
			'font-name' => 'Annie Use Your Telescope',
			'css-name' => 'Annie+Use+Your+Telescope'
		), 
		'50' => array (
			'font-family' => 'font-family: "Anonymous Pro";',
			'font-name' => 'Anonymous Pro',
			'css-name' => 'Anonymous+Pro'
		), 
		'51' => array (
			'font-family' => 'font-family: "Antic";',
			'font-name' => 'Antic',
			'css-name' => 'Antic'
		), 
		'52' => array (
			'font-family' => 'font-family: "Antic Didone";',
			'font-name' => 'Antic Didone',
			'css-name' => 'Antic+Didone'
		), 
		'53' => array (
			'font-family' => 'font-family: "Antic Slab";',
			'font-name' => 'Antic Slab',
			'css-name' => 'Antic+Slab'
		), 
		'54' => array (
			'font-family' => 'font-family: "Anton";',
			'font-name' => 'Anton',
			'css-name' => 'Anton'
		), 
		'55' => array (
			'font-family' => 'font-family: "Arapey";',
			'font-name' => 'Arapey',
			'css-name' => 'Arapey'
		), 
		'56' => array (
			'font-family' => 'font-family: "Arbutus";',
			'font-name' => 'Arbutus',
			'css-name' => 'Arbutus'
		), 
		'57' => array (
			'font-family' => 'font-family: "Arbutus Slab";',
			'font-name' => 'Arbutus Slab',
			'css-name' => 'Arbutus+Slab'
		), 
		'58' => array (
			'font-family' => 'font-family: "Architects Daughter";',
			'font-name' => 'Architects Daughter',
			'css-name' => 'Architects+Daughter'
		), 
		'59' => array (
			'font-family' => 'font-family: "Archivo Black";',
			'font-name' => 'Archivo Black',
			'css-name' => 'Archivo+Black'
		), 
		'60' => array (
			'font-family' => 'font-family: "Archivo Narrow";',
			'font-name' => 'Archivo Narrow',
			'css-name' => 'Archivo+Narrow'
		), 
		'61' => array (
			'font-family' => 'font-family: "Arimo";',
			'font-name' => 'Arimo',
			'css-name' => 'Arimo'
		), 
		'62' => array (
			'font-family' => 'font-family: "Arizonia";',
			'font-name' => 'Arizonia',
			'css-name' => 'Arizonia'
		), 
		'63' => array (
			'font-family' => 'font-family: "Armata";',
			'font-name' => 'Armata',
			'css-name' => 'Armata'
		), 
		'64' => array (
			'font-family' => 'font-family: "Artifika";',
			'font-name' => 'Artifika',
			'css-name' => 'Artifika'
		), 
		'65' => array (
			'font-family' => 'font-family: "Arvo";',
			'font-name' => 'Arvo',
			'css-name' => 'Arvo'
		), 
		'66' => array (
			'font-family' => 'font-family: "Asap";',
			'font-name' => 'Asap',
			'css-name' => 'Asap'
		), 
		'67' => array (
			'font-family' => 'font-family: "Asset";',
			'font-name' => 'Asset',
			'css-name' => 'Asset'
		), 
		'68' => array (
			'font-family' => 'font-family: "Astloch";',
			'font-name' => 'Astloch',
			'css-name' => 'Astloch'
		), 
		'69' => array (
			'font-family' => 'font-family: "Asul";',
			'font-name' => 'Asul',
			'css-name' => 'Asul'
		), 
		'70' => array (
			'font-family' => 'font-family: "Atomic Age";',
			'font-name' => 'Atomic Age',
			'css-name' => 'Atomic+Age'
		), 
		'71' => array (
			'font-family' => 'font-family: "Aubrey";',
			'font-name' => 'Aubrey',
			'css-name' => 'Aubrey'
		), 
		'72' => array (
			'font-family' => 'font-family: "Audiowide";',
			'font-name' => 'Audiowide',
			'css-name' => 'Audiowide'
		), 
		'73' => array (
			'font-family' => 'font-family: "Autour One";',
			'font-name' => 'Autour One',
			'css-name' => 'Autour+One'
		), 
		'74' => array (
			'font-family' => 'font-family: "Average";',
			'font-name' => 'Average',
			'css-name' => 'Average'
		), 
		'75' => array (
			'font-family' => 'font-family: "Average Sans";',
			'font-name' => 'Average Sans',
			'css-name' => 'Average+Sans'
		), 
		'76' => array (
			'font-family' => 'font-family: "Averia Gruesa Libre";',
			'font-name' => 'Averia Gruesa Libre',
			'css-name' => 'Averia+Gruesa+Libre'
		), 
		'77' => array (
			'font-family' => 'font-family: "Averia Libre";',
			'font-name' => 'Averia Libre',
			'css-name' => 'Averia+Libre'
		), 
		'78' => array (
			'font-family' => 'font-family: "Averia Sans Libre";',
			'font-name' => 'Averia Sans Libre',
			'css-name' => 'Averia+Sans+Libre'
		), 
		'79' => array (
			'font-family' => 'font-family: "Averia Serif Libre";',
			'font-name' => 'Averia Serif Libre',
			'css-name' => 'Averia+Serif+Libre'
		), 
		'80' => array (
			'font-family' => 'font-family: "Bad Script";',
			'font-name' => 'Bad Script',
			'css-name' => 'Bad+Script'
		), 
		'81' => array (
			'font-family' => 'font-family: "Balthazar";',
			'font-name' => 'Balthazar',
			'css-name' => 'Balthazar'
		), 
		'82' => array (
			'font-family' => 'font-family: "Bangers";',
			'font-name' => 'Bangers',
			'css-name' => 'Bangers'
		), 
		'83' => array (
			'font-family' => 'font-family: "Basic";',
			'font-name' => 'Basic',
			'css-name' => 'Basic'
		), 
		'84' => array (
			'font-family' => 'font-family: "Battambang";',
			'font-name' => 'Battambang',
			'css-name' => 'Battambang'
		), 
		'85' => array (
			'font-family' => 'font-family: "Baumans";',
			'font-name' => 'Baumans',
			'css-name' => 'Baumans'
		), 
		'86' => array (
			'font-family' => 'font-family: "Bayon";',
			'font-name' => 'Bayon',
			'css-name' => 'Bayon'
		), 
		'87' => array (
			'font-family' => 'font-family: "Belgrano";',
			'font-name' => 'Belgrano',
			'css-name' => 'Belgrano'
		), 
		'88' => array (
			'font-family' => 'font-family: "Belleza";',
			'font-name' => 'Belleza',
			'css-name' => 'Belleza'
		), 
		'89' => array (
			'font-family' => 'font-family: "BenchNine";',
			'font-name' => 'BenchNine',
			'css-name' => 'BenchNine'
		), 
		'90' => array (
			'font-family' => 'font-family: "Bentham";',
			'font-name' => 'Bentham',
			'css-name' => 'Bentham'
		), 
		'91' => array (
			'font-family' => 'font-family: "Berkshire Swash";',
			'font-name' => 'Berkshire Swash',
			'css-name' => 'Berkshire+Swash'
		), 
		'92' => array (
			'font-family' => 'font-family: "Bevan";',
			'font-name' => 'Bevan',
			'css-name' => 'Bevan'
		), 
		'93' => array (
			'font-family' => 'font-family: "Bigelow Rules";',
			'font-name' => 'Bigelow Rules',
			'css-name' => 'Bigelow+Rules'
		), 
		'94' => array (
			'font-family' => 'font-family: "Bigshot One";',
			'font-name' => 'Bigshot One',
			'css-name' => 'Bigshot+One'
		), 
		'95' => array (
			'font-family' => 'font-family: "Bilbo";',
			'font-name' => 'Bilbo',
			'css-name' => 'Bilbo'
		), 
		'96' => array (
			'font-family' => 'font-family: "Bilbo Swash Caps";',
			'font-name' => 'Bilbo Swash Caps',
			'css-name' => 'Bilbo+Swash+Caps'
		), 
		'97' => array (
			'font-family' => 'font-family: "Bitter";',
			'font-name' => 'Bitter',
			'css-name' => 'Bitter'
		), 
		'98' => array (
			'font-family' => 'font-family: "Black Ops One";',
			'font-name' => 'Black Ops One',
			'css-name' => 'Black+Ops+One'
		), 
		'99' => array (
			'font-family' => 'font-family: "Bokor";',
			'font-name' => 'Bokor',
			'css-name' => 'Bokor'
		), 
		'100' => array (
			'font-family' => 'font-family: "Bonbon";',
			'font-name' => 'Bonbon',
			'css-name' => 'Bonbon'
		), 
		'101' => array (
			'font-family' => 'font-family: "Boogaloo";',
			'font-name' => 'Boogaloo',
			'css-name' => 'Boogaloo'
		), 
		'102' => array (
			'font-family' => 'font-family: "Bowlby One";',
			'font-name' => 'Bowlby One',
			'css-name' => 'Bowlby+One'
		), 
		'103' => array (
			'font-family' => 'font-family: "Bowlby One SC";',
			'font-name' => 'Bowlby One SC',
			'css-name' => 'Bowlby+One+SC'
		), 
		'104' => array (
			'font-family' => 'font-family: "Brawler";',
			'font-name' => 'Brawler',
			'css-name' => 'Brawler'
		), 
		'105' => array (
			'font-family' => 'font-family: "Bree Serif";',
			'font-name' => 'Bree Serif',
			'css-name' => 'Bree+Serif'
		), 
		'106' => array (
			'font-family' => 'font-family: "Bubblegum Sans";',
			'font-name' => 'Bubblegum Sans',
			'css-name' => 'Bubblegum+Sans'
		), 
		'107' => array (
			'font-family' => 'font-family: "Bubbler One";',
			'font-name' => 'Bubbler One',
			'css-name' => 'Bubbler+One'
		), 
		'108' => array (
			'font-family' => 'font-family: "Buda";',
			'font-name' => 'Buda',
			'css-name' => 'Buda'
		), 
		'109' => array (
			'font-family' => 'font-family: "Buenard";',
			'font-name' => 'Buenard',
			'css-name' => 'Buenard'
		), 
		'110' => array (
			'font-family' => 'font-family: "Butcherman";',
			'font-name' => 'Butcherman',
			'css-name' => 'Butcherman'
		), 
		'111' => array (
			'font-family' => 'font-family: "Butterfly Kids";',
			'font-name' => 'Butterfly Kids',
			'css-name' => 'Butterfly+Kids'
		), 
		'112' => array (
			'font-family' => 'font-family: "Cabin";',
			'font-name' => 'Cabin',
			'css-name' => 'Cabin'
		), 
		'113' => array (
			'font-family' => 'font-family: "Cabin Condensed";',
			'font-name' => 'Cabin Condensed',
			'css-name' => 'Cabin+Condensed'
		), 
		'114' => array (
			'font-family' => 'font-family: "Cabin Sketch";',
			'font-name' => 'Cabin Sketch',
			'css-name' => 'Cabin+Sketch'
		), 
		'115' => array (
			'font-family' => 'font-family: "Caesar Dressing";',
			'font-name' => 'Caesar Dressing',
			'css-name' => 'Caesar+Dressing'
		), 
		'116' => array (
			'font-family' => 'font-family: "Cagliostro";',
			'font-name' => 'Cagliostro',
			'css-name' => 'Cagliostro'
		), 
		'117' => array (
			'font-family' => 'font-family: "Calligraffitti";',
			'font-name' => 'Calligraffitti',
			'css-name' => 'Calligraffitti'
		), 
		'118' => array (
			'font-family' => 'font-family: "Cambay";',
			'font-name' => 'Cambay',
			'css-name' => 'Cambay'
		), 
		'119' => array (
			'font-family' => 'font-family: "Cambo";',
			'font-name' => 'Cambo',
			'css-name' => 'Cambo'
		), 
		'120' => array (
			'font-family' => 'font-family: "Candal";',
			'font-name' => 'Candal',
			'css-name' => 'Candal'
		), 
		'121' => array (
			'font-family' => 'font-family: "Cantarell";',
			'font-name' => 'Cantarell',
			'css-name' => 'Cantarell'
		), 
		'122' => array (
			'font-family' => 'font-family: "Cantata One";',
			'font-name' => 'Cantata One',
			'css-name' => 'Cantata+One'
		), 
		'123' => array (
			'font-family' => 'font-family: "Cantora One";',
			'font-name' => 'Cantora One',
			'css-name' => 'Cantora+One'
		), 
		'124' => array (
			'font-family' => 'font-family: "Capriola";',
			'font-name' => 'Capriola',
			'css-name' => 'Capriola'
		), 
		'125' => array (
			'font-family' => 'font-family: "Cardo";',
			'font-name' => 'Cardo',
			'css-name' => 'Cardo'
		), 
		'126' => array (
			'font-family' => 'font-family: "Carme";',
			'font-name' => 'Carme',
			'css-name' => 'Carme'
		), 
		'127' => array (
			'font-family' => 'font-family: "Carrois Gothic";',
			'font-name' => 'Carrois Gothic',
			'css-name' => 'Carrois+Gothic'
		), 
		'128' => array (
			'font-family' => 'font-family: "Carrois Gothic SC";',
			'font-name' => 'Carrois Gothic SC',
			'css-name' => 'Carrois+Gothic+SC'
		), 
		'129' => array (
			'font-family' => 'font-family: "Carter One";',
			'font-name' => 'Carter One',
			'css-name' => 'Carter+One'
		), 
		'130' => array (
			'font-family' => 'font-family: "Caudex";',
			'font-name' => 'Caudex',
			'css-name' => 'Caudex'
		), 
		'131' => array (
			'font-family' => 'font-family: "Cedarville Cursive";',
			'font-name' => 'Cedarville Cursive',
			'css-name' => 'Cedarville+Cursive'
		), 
		'132' => array (
			'font-family' => 'font-family: "Ceviche One";',
			'font-name' => 'Ceviche One',
			'css-name' => 'Ceviche+One'
		), 
		'133' => array (
			'font-family' => 'font-family: "Changa One";',
			'font-name' => 'Changa One',
			'css-name' => 'Changa+One'
		), 
		'134' => array (
			'font-family' => 'font-family: "Chango";',
			'font-name' => 'Chango',
			'css-name' => 'Chango'
		), 
		'135' => array (
			'font-family' => 'font-family: "Chau Philomene One";',
			'font-name' => 'Chau Philomene One',
			'css-name' => 'Chau+Philomene+One'
		), 
		'136' => array (
			'font-family' => 'font-family: "Chela One";',
			'font-name' => 'Chela One',
			'css-name' => 'Chela+One'
		), 
		'137' => array (
			'font-family' => 'font-family: "Chelsea Market";',
			'font-name' => 'Chelsea Market',
			'css-name' => 'Chelsea+Market'
		), 
		'138' => array (
			'font-family' => 'font-family: "Chenla";',
			'font-name' => 'Chenla',
			'css-name' => 'Chenla'
		), 
		'139' => array (
			'font-family' => 'font-family: "Cherry Cream Soda";',
			'font-name' => 'Cherry Cream Soda',
			'css-name' => 'Cherry+Cream+Soda'
		), 
		'140' => array (
			'font-family' => 'font-family: "Cherry Swash";',
			'font-name' => 'Cherry Swash',
			'css-name' => 'Cherry+Swash'
		), 
		'141' => array (
			'font-family' => 'font-family: "Chewy";',
			'font-name' => 'Chewy',
			'css-name' => 'Chewy'
		), 
		'142' => array (
			'font-family' => 'font-family: "Chicle";',
			'font-name' => 'Chicle',
			'css-name' => 'Chicle'
		), 
		'143' => array (
			'font-family' => 'font-family: "Chivo";',
			'font-name' => 'Chivo',
			'css-name' => 'Chivo'
		), 
		'144' => array (
			'font-family' => 'font-family: "Cinzel";',
			'font-name' => 'Cinzel',
			'css-name' => 'Cinzel'
		), 
		'145' => array (
			'font-family' => 'font-family: "Cinzel Decorative";',
			'font-name' => 'Cinzel Decorative',
			'css-name' => 'Cinzel+Decorative'
		), 
		'146' => array (
			'font-family' => 'font-family: "Clicker Script";',
			'font-name' => 'Clicker Script',
			'css-name' => 'Clicker+Script'
		), 
		'147' => array (
			'font-family' => 'font-family: "Coda";',
			'font-name' => 'Coda',
			'css-name' => 'Coda'
		), 
		'148' => array (
			'font-family' => 'font-family: "Coda Caption";',
			'font-name' => 'Coda Caption',
			'css-name' => 'Coda+Caption'
		), 
		'149' => array (
			'font-family' => 'font-family: "Codystar";',
			'font-name' => 'Codystar',
			'css-name' => 'Codystar'
		), 
		'150' => array (
			'font-family' => 'font-family: "Combo";',
			'font-name' => 'Combo',
			'css-name' => 'Combo'
		), 
		'151' => array (
			'font-family' => 'font-family: "Comfortaa";',
			'font-name' => 'Comfortaa',
			'css-name' => 'Comfortaa'
		), 
		'152' => array (
			'font-family' => 'font-family: "Coming Soon";',
			'font-name' => 'Coming Soon',
			'css-name' => 'Coming+Soon'
		), 
		'153' => array (
			'font-family' => 'font-family: "Concert One";',
			'font-name' => 'Concert One',
			'css-name' => 'Concert+One'
		), 
		'154' => array (
			'font-family' => 'font-family: "Condiment";',
			'font-name' => 'Condiment',
			'css-name' => 'Condiment'
		), 
		'155' => array (
			'font-family' => 'font-family: "Content";',
			'font-name' => 'Content',
			'css-name' => 'Content'
		), 
		'156' => array (
			'font-family' => 'font-family: "Contrail One";',
			'font-name' => 'Contrail One',
			'css-name' => 'Contrail+One'
		), 
		'157' => array (
			'font-family' => 'font-family: "Convergence";',
			'font-name' => 'Convergence',
			'css-name' => 'Convergence'
		), 
		'158' => array (
			'font-family' => 'font-family: "Cookie";',
			'font-name' => 'Cookie',
			'css-name' => 'Cookie'
		), 
		'159' => array (
			'font-family' => 'font-family: "Copse";',
			'font-name' => 'Copse',
			'css-name' => 'Copse'
		), 
		'160' => array (
			'font-family' => 'font-family: "Corben";',
			'font-name' => 'Corben',
			'css-name' => 'Corben'
		), 
		'161' => array (
			'font-family' => 'font-family: "Courgette";',
			'font-name' => 'Courgette',
			'css-name' => 'Courgette'
		), 
		'162' => array (
			'font-family' => 'font-family: "Cousine";',
			'font-name' => 'Cousine',
			'css-name' => 'Cousine'
		), 
		'163' => array (
			'font-family' => 'font-family: "Coustard";',
			'font-name' => 'Coustard',
			'css-name' => 'Coustard'
		), 
		'164' => array (
			'font-family' => 'font-family: "Covered By Your Grace";',
			'font-name' => 'Covered By Your Grace',
			'css-name' => 'Covered+By+Your+Grace'
		), 
		'165' => array (
			'font-family' => 'font-family: "Crafty Girls";',
			'font-name' => 'Crafty Girls',
			'css-name' => 'Crafty+Girls'
		), 
		'166' => array (
			'font-family' => 'font-family: "Creepster";',
			'font-name' => 'Creepster',
			'css-name' => 'Creepster'
		), 
		'167' => array (
			'font-family' => 'font-family: "Crete Round";',
			'font-name' => 'Crete Round',
			'css-name' => 'Crete+Round'
		), 
		'168' => array (
			'font-family' => 'font-family: "Crimson Text";',
			'font-name' => 'Crimson Text',
			'css-name' => 'Crimson+Text'
		), 
		'169' => array (
			'font-family' => 'font-family: "Croissant One";',
			'font-name' => 'Croissant One',
			'css-name' => 'Croissant+One'
		), 
		'170' => array (
			'font-family' => 'font-family: "Crushed";',
			'font-name' => 'Crushed',
			'css-name' => 'Crushed'
		), 
		'171' => array (
			'font-family' => 'font-family: "Cuprum";',
			'font-name' => 'Cuprum',
			'css-name' => 'Cuprum'
		), 
		'172' => array (
			'font-family' => 'font-family: "Cutive";',
			'font-name' => 'Cutive',
			'css-name' => 'Cutive'
		), 
		'173' => array (
			'font-family' => 'font-family: "Cutive Mono";',
			'font-name' => 'Cutive Mono',
			'css-name' => 'Cutive+Mono'
		), 
		'174' => array (
			'font-family' => 'font-family: "Damion";',
			'font-name' => 'Damion',
			'css-name' => 'Damion'
		), 
		'175' => array (
			'font-family' => 'font-family: "Dancing Script";',
			'font-name' => 'Dancing Script',
			'css-name' => 'Dancing+Script'
		), 
		'176' => array (
			'font-family' => 'font-family: "Dangrek";',
			'font-name' => 'Dangrek',
			'css-name' => 'Dangrek'
		), 
		'177' => array (
			'font-family' => 'font-family: "Dawning of a New Day";',
			'font-name' => 'Dawning of a New Day',
			'css-name' => 'Dawning+of+a+New+Day'
		), 
		'178' => array (
			'font-family' => 'font-family: "Days One";',
			'font-name' => 'Days One',
			'css-name' => 'Days+One'
		), 
		'179' => array (
			'font-family' => 'font-family: "Dekko";',
			'font-name' => 'Dekko',
			'css-name' => 'Dekko'
		), 
		'180' => array (
			'font-family' => 'font-family: "Delius";',
			'font-name' => 'Delius',
			'css-name' => 'Delius'
		), 
		'181' => array (
			'font-family' => 'font-family: "Delius Swash Caps";',
			'font-name' => 'Delius Swash Caps',
			'css-name' => 'Delius+Swash+Caps'
		), 
		'182' => array (
			'font-family' => 'font-family: "Delius Unicase";',
			'font-name' => 'Delius Unicase',
			'css-name' => 'Delius+Unicase'
		), 
		'183' => array (
			'font-family' => 'font-family: "Della Respira";',
			'font-name' => 'Della Respira',
			'css-name' => 'Della+Respira'
		), 
		'184' => array (
			'font-family' => 'font-family: "Denk One";',
			'font-name' => 'Denk One',
			'css-name' => 'Denk+One'
		), 
		'185' => array (
			'font-family' => 'font-family: "Devonshire";',
			'font-name' => 'Devonshire',
			'css-name' => 'Devonshire'
		), 
		'186' => array (
			'font-family' => 'font-family: "Dhurjati";',
			'font-name' => 'Dhurjati',
			'css-name' => 'Dhurjati'
		), 
		'187' => array (
			'font-family' => 'font-family: "Didact Gothic";',
			'font-name' => 'Didact Gothic',
			'css-name' => 'Didact+Gothic'
		), 
		'188' => array (
			'font-family' => 'font-family: "Diplomata";',
			'font-name' => 'Diplomata',
			'css-name' => 'Diplomata'
		), 
		'189' => array (
			'font-family' => 'font-family: "Diplomata SC";',
			'font-name' => 'Diplomata SC',
			'css-name' => 'Diplomata+SC'
		), 
		'190' => array (
			'font-family' => 'font-family: "Domine";',
			'font-name' => 'Domine',
			'css-name' => 'Domine'
		), 
		'191' => array (
			'font-family' => 'font-family: "Donegal One";',
			'font-name' => 'Donegal One',
			'css-name' => 'Donegal+One'
		), 
		'192' => array (
			'font-family' => 'font-family: "Doppio One";',
			'font-name' => 'Doppio One',
			'css-name' => 'Doppio+One'
		), 
		'193' => array (
			'font-family' => 'font-family: "Dorsa";',
			'font-name' => 'Dorsa',
			'css-name' => 'Dorsa'
		), 
		'194' => array (
			'font-family' => 'font-family: "Dosis";',
			'font-name' => 'Dosis',
			'css-name' => 'Dosis'
		), 
		'195' => array (
			'font-family' => 'font-family: "Dr Sugiyama";',
			'font-name' => 'Dr Sugiyama',
			'css-name' => 'Dr+Sugiyama'
		), 
		'196' => array (
			'font-family' => 'font-family: "Droid Sans";',
			'font-name' => 'Droid Sans',
			'css-name' => 'Droid+Sans'
		), 
		'197' => array (
			'font-family' => 'font-family: "Droid Sans Mono";',
			'font-name' => 'Droid Sans Mono',
			'css-name' => 'Droid+Sans+Mono'
		), 
		'198' => array (
			'font-family' => 'font-family: "Droid Serif";',
			'font-name' => 'Droid Serif',
			'css-name' => 'Droid+Serif'
		), 
		'199' => array (
			'font-family' => 'font-family: "Duru Sans";',
			'font-name' => 'Duru Sans',
			'css-name' => 'Duru+Sans'
		), 
		'200' => array (
			'font-family' => 'font-family: "Dynalight";',
			'font-name' => 'Dynalight',
			'css-name' => 'Dynalight'
		), 
		'201' => array (
			'font-family' => 'font-family: "EB Garamond";',
			'font-name' => 'EB Garamond',
			'css-name' => 'EB+Garamond'
		), 
		'202' => array (
			'font-family' => 'font-family: "Eagle Lake";',
			'font-name' => 'Eagle Lake',
			'css-name' => 'Eagle+Lake'
		), 
		'203' => array (
			'font-family' => 'font-family: "Eater";',
			'font-name' => 'Eater',
			'css-name' => 'Eater'
		), 
		'204' => array (
			'font-family' => 'font-family: "Economica";',
			'font-name' => 'Economica',
			'css-name' => 'Economica'
		), 
		'205' => array (
			'font-family' => 'font-family: "Ek Mukta";',
			'font-name' => 'Ek Mukta',
			'css-name' => 'Ek+Mukta'
		), 
		'206' => array (
			'font-family' => 'font-family: "Electrolize";',
			'font-name' => 'Electrolize',
			'css-name' => 'Electrolize'
		), 
		'207' => array (
			'font-family' => 'font-family: "Elsie";',
			'font-name' => 'Elsie',
			'css-name' => 'Elsie'
		), 
		'208' => array (
			'font-family' => 'font-family: "Elsie Swash Caps";',
			'font-name' => 'Elsie Swash Caps',
			'css-name' => 'Elsie+Swash+Caps'
		), 
		'209' => array (
			'font-family' => 'font-family: "Emblema One";',
			'font-name' => 'Emblema One',
			'css-name' => 'Emblema+One'
		), 
		'210' => array (
			'font-family' => 'font-family: "Emilys Candy";',
			'font-name' => 'Emilys Candy',
			'css-name' => 'Emilys+Candy'
		), 
		'211' => array (
			'font-family' => 'font-family: "Engagement";',
			'font-name' => 'Engagement',
			'css-name' => 'Engagement'
		), 
		'212' => array (
			'font-family' => 'font-family: "Englebert";',
			'font-name' => 'Englebert',
			'css-name' => 'Englebert'
		), 
		'213' => array (
			'font-family' => 'font-family: "Enriqueta";',
			'font-name' => 'Enriqueta',
			'css-name' => 'Enriqueta'
		), 
		'214' => array (
			'font-family' => 'font-family: "Erica One";',
			'font-name' => 'Erica One',
			'css-name' => 'Erica+One'
		), 
		'215' => array (
			'font-family' => 'font-family: "Esteban";',
			'font-name' => 'Esteban',
			'css-name' => 'Esteban'
		), 
		'216' => array (
			'font-family' => 'font-family: "Euphoria Script";',
			'font-name' => 'Euphoria Script',
			'css-name' => 'Euphoria+Script'
		), 
		'217' => array (
			'font-family' => 'font-family: "Ewert";',
			'font-name' => 'Ewert',
			'css-name' => 'Ewert'
		), 
		'218' => array (
			'font-family' => 'font-family: "Exo";',
			'font-name' => 'Exo',
			'css-name' => 'Exo'
		), 
		'219' => array (
			'font-family' => 'font-family: "Exo 2";',
			'font-name' => 'Exo 2',
			'css-name' => 'Exo+2'
		), 
		'220' => array (
			'font-family' => 'font-family: "Expletus Sans";',
			'font-name' => 'Expletus Sans',
			'css-name' => 'Expletus+Sans'
		), 
		'221' => array (
			'font-family' => 'font-family: "Fanwood Text";',
			'font-name' => 'Fanwood Text',
			'css-name' => 'Fanwood+Text'
		), 
		'222' => array (
			'font-family' => 'font-family: "Fascinate";',
			'font-name' => 'Fascinate',
			'css-name' => 'Fascinate'
		), 
		'223' => array (
			'font-family' => 'font-family: "Fascinate Inline";',
			'font-name' => 'Fascinate Inline',
			'css-name' => 'Fascinate+Inline'
		), 
		'224' => array (
			'font-family' => 'font-family: "Faster One";',
			'font-name' => 'Faster One',
			'css-name' => 'Faster+One'
		), 
		'225' => array (
			'font-family' => 'font-family: "Fasthand";',
			'font-name' => 'Fasthand',
			'css-name' => 'Fasthand'
		), 
		'226' => array (
			'font-family' => 'font-family: "Fauna One";',
			'font-name' => 'Fauna One',
			'css-name' => 'Fauna+One'
		), 
		'227' => array (
			'font-family' => 'font-family: "Federant";',
			'font-name' => 'Federant',
			'css-name' => 'Federant'
		), 
		'228' => array (
			'font-family' => 'font-family: "Federo";',
			'font-name' => 'Federo',
			'css-name' => 'Federo'
		), 
		'229' => array (
			'font-family' => 'font-family: "Felipa";',
			'font-name' => 'Felipa',
			'css-name' => 'Felipa'
		), 
		'230' => array (
			'font-family' => 'font-family: "Fenix";',
			'font-name' => 'Fenix',
			'css-name' => 'Fenix'
		), 
		'231' => array (
			'font-family' => 'font-family: "Finger Paint";',
			'font-name' => 'Finger Paint',
			'css-name' => 'Finger+Paint'
		), 
		'232' => array (
			'font-family' => 'font-family: "Fira Mono";',
			'font-name' => 'Fira Mono',
			'css-name' => 'Fira+Mono'
		), 
		'233' => array (
			'font-family' => 'font-family: "Fira Sans";',
			'font-name' => 'Fira Sans',
			'css-name' => 'Fira+Sans'
		), 
		'234' => array (
			'font-family' => 'font-family: "Fjalla One";',
			'font-name' => 'Fjalla One',
			'css-name' => 'Fjalla+One'
		), 
		'235' => array (
			'font-family' => 'font-family: "Fjord One";',
			'font-name' => 'Fjord One',
			'css-name' => 'Fjord+One'
		), 
		'236' => array (
			'font-family' => 'font-family: "Flamenco";',
			'font-name' => 'Flamenco',
			'css-name' => 'Flamenco'
		), 
		'237' => array (
			'font-family' => 'font-family: "Flavors";',
			'font-name' => 'Flavors',
			'css-name' => 'Flavors'
		), 
		'238' => array (
			'font-family' => 'font-family: "Fondamento";',
			'font-name' => 'Fondamento',
			'css-name' => 'Fondamento'
		), 
		'239' => array (
			'font-family' => 'font-family: "Fontdiner Swanky";',
			'font-name' => 'Fontdiner Swanky',
			'css-name' => 'Fontdiner+Swanky'
		), 
		'240' => array (
			'font-family' => 'font-family: "Forum";',
			'font-name' => 'Forum',
			'css-name' => 'Forum'
		), 
		'241' => array (
			'font-family' => 'font-family: "Francois One";',
			'font-name' => 'Francois One',
			'css-name' => 'Francois+One'
		), 
		'242' => array (
			'font-family' => 'font-family: "Freckle Face";',
			'font-name' => 'Freckle Face',
			'css-name' => 'Freckle+Face'
		), 
		'243' => array (
			'font-family' => 'font-family: "Fredericka the Great";',
			'font-name' => 'Fredericka the Great',
			'css-name' => 'Fredericka+the+Great'
		), 
		'244' => array (
			'font-family' => 'font-family: "Fredoka One";',
			'font-name' => 'Fredoka One',
			'css-name' => 'Fredoka+One'
		), 
		'245' => array (
			'font-family' => 'font-family: "Freehand";',
			'font-name' => 'Freehand',
			'css-name' => 'Freehand'
		), 
		'246' => array (
			'font-family' => 'font-family: "Fresca";',
			'font-name' => 'Fresca',
			'css-name' => 'Fresca'
		), 
		'247' => array (
			'font-family' => 'font-family: "Frijole";',
			'font-name' => 'Frijole',
			'css-name' => 'Frijole'
		), 
		'248' => array (
			'font-family' => 'font-family: "Fruktur";',
			'font-name' => 'Fruktur',
			'css-name' => 'Fruktur'
		), 
		'249' => array (
			'font-family' => 'font-family: "Fugaz One";',
			'font-name' => 'Fugaz One',
			'css-name' => 'Fugaz+One'
		), 
		'250' => array (
			'font-family' => 'font-family: "GFS Didot";',
			'font-name' => 'GFS Didot',
			'css-name' => 'GFS+Didot'
		), 
		'251' => array (
			'font-family' => 'font-family: "GFS Neohellenic";',
			'font-name' => 'GFS Neohellenic',
			'css-name' => 'GFS+Neohellenic'
		), 
		'252' => array (
			'font-family' => 'font-family: "Gabriela";',
			'font-name' => 'Gabriela',
			'css-name' => 'Gabriela'
		), 
		'253' => array (
			'font-family' => 'font-family: "Gafata";',
			'font-name' => 'Gafata',
			'css-name' => 'Gafata'
		), 
		'254' => array (
			'font-family' => 'font-family: "Galdeano";',
			'font-name' => 'Galdeano',
			'css-name' => 'Galdeano'
		), 
		'255' => array (
			'font-family' => 'font-family: "Galindo";',
			'font-name' => 'Galindo',
			'css-name' => 'Galindo'
		), 
		'256' => array (
			'font-family' => 'font-family: "Gentium Basic";',
			'font-name' => 'Gentium Basic',
			'css-name' => 'Gentium+Basic'
		), 
		'257' => array (
			'font-family' => 'font-family: "Gentium Book Basic";',
			'font-name' => 'Gentium Book Basic',
			'css-name' => 'Gentium+Book+Basic'
		), 
		'258' => array (
			'font-family' => 'font-family: "Geo";',
			'font-name' => 'Geo',
			'css-name' => 'Geo'
		), 
		'259' => array (
			'font-family' => 'font-family: "Geostar";',
			'font-name' => 'Geostar',
			'css-name' => 'Geostar'
		), 
		'260' => array (
			'font-family' => 'font-family: "Geostar Fill";',
			'font-name' => 'Geostar Fill',
			'css-name' => 'Geostar+Fill'
		), 
		'261' => array (
			'font-family' => 'font-family: "Germania One";',
			'font-name' => 'Germania One',
			'css-name' => 'Germania+One'
		), 
		'262' => array (
			'font-family' => 'font-family: "Gidugu";',
			'font-name' => 'Gidugu',
			'css-name' => 'Gidugu'
		), 
		'263' => array (
			'font-family' => 'font-family: "Gilda Display";',
			'font-name' => 'Gilda Display',
			'css-name' => 'Gilda+Display'
		), 
		'264' => array (
			'font-family' => 'font-family: "Give You Glory";',
			'font-name' => 'Give You Glory',
			'css-name' => 'Give+You+Glory'
		), 
		'265' => array (
			'font-family' => 'font-family: "Glass Antiqua";',
			'font-name' => 'Glass Antiqua',
			'css-name' => 'Glass+Antiqua'
		), 
		'266' => array (
			'font-family' => 'font-family: "Glegoo";',
			'font-name' => 'Glegoo',
			'css-name' => 'Glegoo'
		), 
		'267' => array (
			'font-family' => 'font-family: "Gloria Hallelujah";',
			'font-name' => 'Gloria Hallelujah',
			'css-name' => 'Gloria+Hallelujah'
		), 
		'268' => array (
			'font-family' => 'font-family: "Goblin One";',
			'font-name' => 'Goblin One',
			'css-name' => 'Goblin+One'
		), 
		'269' => array (
			'font-family' => 'font-family: "Gochi Hand";',
			'font-name' => 'Gochi Hand',
			'css-name' => 'Gochi+Hand'
		), 
		'270' => array (
			'font-family' => 'font-family: "Gorditas";',
			'font-name' => 'Gorditas',
			'css-name' => 'Gorditas'
		), 
		'271' => array (
			'font-family' => 'font-family: "Goudy Bookletter 1911";',
			'font-name' => 'Goudy Bookletter 1911',
			'css-name' => 'Goudy+Bookletter+1911'
		), 
		'272' => array (
			'font-family' => 'font-family: "Graduate";',
			'font-name' => 'Graduate',
			'css-name' => 'Graduate'
		), 
		'273' => array (
			'font-family' => 'font-family: "Grand Hotel";',
			'font-name' => 'Grand Hotel',
			'css-name' => 'Grand+Hotel'
		), 
		'274' => array (
			'font-family' => 'font-family: "Gravitas One";',
			'font-name' => 'Gravitas One',
			'css-name' => 'Gravitas+One'
		), 
		'275' => array (
			'font-family' => 'font-family: "Great Vibes";',
			'font-name' => 'Great Vibes',
			'css-name' => 'Great+Vibes'
		), 
		'276' => array (
			'font-family' => 'font-family: "Griffy";',
			'font-name' => 'Griffy',
			'css-name' => 'Griffy'
		), 
		'277' => array (
			'font-family' => 'font-family: "Gruppo";',
			'font-name' => 'Gruppo',
			'css-name' => 'Gruppo'
		), 
		'278' => array (
			'font-family' => 'font-family: "Gudea";',
			'font-name' => 'Gudea',
			'css-name' => 'Gudea'
		), 
		'279' => array (
			'font-family' => 'font-family: "Gurajada";',
			'font-name' => 'Gurajada',
			'css-name' => 'Gurajada'
		), 
		'280' => array (
			'font-family' => 'font-family: "Habibi";',
			'font-name' => 'Habibi',
			'css-name' => 'Habibi'
		), 
		'281' => array (
			'font-family' => 'font-family: "Halant";',
			'font-name' => 'Halant',
			'css-name' => 'Halant'
		), 
		'282' => array (
			'font-family' => 'font-family: "Hammersmith One";',
			'font-name' => 'Hammersmith One',
			'css-name' => 'Hammersmith+One'
		), 
		'283' => array (
			'font-family' => 'font-family: "Hanalei";',
			'font-name' => 'Hanalei',
			'css-name' => 'Hanalei'
		), 
		'284' => array (
			'font-family' => 'font-family: "Hanalei Fill";',
			'font-name' => 'Hanalei Fill',
			'css-name' => 'Hanalei+Fill'
		), 
		'285' => array (
			'font-family' => 'font-family: "Handlee";',
			'font-name' => 'Handlee',
			'css-name' => 'Handlee'
		), 
		'286' => array (
			'font-family' => 'font-family: "Hanuman";',
			'font-name' => 'Hanuman',
			'css-name' => 'Hanuman'
		), 
		'287' => array (
			'font-family' => 'font-family: "Happy Monkey";',
			'font-name' => 'Happy Monkey',
			'css-name' => 'Happy+Monkey'
		), 
		'288' => array (
			'font-family' => 'font-family: "Headland One";',
			'font-name' => 'Headland One',
			'css-name' => 'Headland+One'
		), 
		'289' => array (
			'font-family' => 'font-family: "Henny Penny";',
			'font-name' => 'Henny Penny',
			'css-name' => 'Henny+Penny'
		), 
		'290' => array (
			'font-family' => 'font-family: "Herr Von Muellerhoff";',
			'font-name' => 'Herr Von Muellerhoff',
			'css-name' => 'Herr+Von+Muellerhoff'
		), 
		'291' => array (
			'font-family' => 'font-family: "Hind";',
			'font-name' => 'Hind',
			'css-name' => 'Hind'
		), 
		'292' => array (
			'font-family' => 'font-family: "Holtwood One SC";',
			'font-name' => 'Holtwood One SC',
			'css-name' => 'Holtwood+One+SC'
		), 
		'293' => array (
			'font-family' => 'font-family: "Homemade Apple";',
			'font-name' => 'Homemade Apple',
			'css-name' => 'Homemade+Apple'
		), 
		'294' => array (
			'font-family' => 'font-family: "Homenaje";',
			'font-name' => 'Homenaje',
			'css-name' => 'Homenaje'
		), 
		'295' => array (
			'font-family' => 'font-family: "IM Fell DW Pica";',
			'font-name' => 'IM Fell DW Pica',
			'css-name' => 'IM+Fell+DW+Pica'
		), 
		'296' => array (
			'font-family' => 'font-family: "IM Fell DW Pica SC";',
			'font-name' => 'IM Fell DW Pica SC',
			'css-name' => 'IM+Fell+DW+Pica+SC'
		), 
		'297' => array (
			'font-family' => 'font-family: "IM Fell Double Pica";',
			'font-name' => 'IM Fell Double Pica',
			'css-name' => 'IM+Fell+Double+Pica'
		), 
		'298' => array (
			'font-family' => 'font-family: "IM Fell Double Pica SC";',
			'font-name' => 'IM Fell Double Pica SC',
			'css-name' => 'IM+Fell+Double+Pica+SC'
		), 
		'299' => array (
			'font-family' => 'font-family: "IM Fell English";',
			'font-name' => 'IM Fell English',
			'css-name' => 'IM+Fell+English'
		), 
		'300' => array (
			'font-family' => 'font-family: "IM Fell English SC";',
			'font-name' => 'IM Fell English SC',
			'css-name' => 'IM+Fell+English+SC'
		), 
		'301' => array (
			'font-family' => 'font-family: "IM Fell French Canon";',
			'font-name' => 'IM Fell French Canon',
			'css-name' => 'IM+Fell+French+Canon'
		), 
		'302' => array (
			'font-family' => 'font-family: "IM Fell French Canon SC";',
			'font-name' => 'IM Fell French Canon SC',
			'css-name' => 'IM+Fell+French+Canon+SC'
		), 
		'303' => array (
			'font-family' => 'font-family: "IM Fell Great Primer";',
			'font-name' => 'IM Fell Great Primer',
			'css-name' => 'IM+Fell+Great+Primer'
		), 
		'304' => array (
			'font-family' => 'font-family: "IM Fell Great Primer SC";',
			'font-name' => 'IM Fell Great Primer SC',
			'css-name' => 'IM+Fell+Great+Primer+SC'
		), 
		'305' => array (
			'font-family' => 'font-family: "Iceberg";',
			'font-name' => 'Iceberg',
			'css-name' => 'Iceberg'
		), 
		'306' => array (
			'font-family' => 'font-family: "Iceland";',
			'font-name' => 'Iceland',
			'css-name' => 'Iceland'
		), 
		'307' => array (
			'font-family' => 'font-family: "Imprima";',
			'font-name' => 'Imprima',
			'css-name' => 'Imprima'
		), 
		'308' => array (
			'font-family' => 'font-family: "Inconsolata";',
			'font-name' => 'Inconsolata',
			'css-name' => 'Inconsolata'
		), 
		'309' => array (
			'font-family' => 'font-family: "Inder";',
			'font-name' => 'Inder',
			'css-name' => 'Inder'
		), 
		'310' => array (
			'font-family' => 'font-family: "Indie Flower";',
			'font-name' => 'Indie Flower',
			'css-name' => 'Indie+Flower'
		), 
		'311' => array (
			'font-family' => 'font-family: "Inika";',
			'font-name' => 'Inika',
			'css-name' => 'Inika'
		), 
		'312' => array (
			'font-family' => 'font-family: "Irish Grover";',
			'font-name' => 'Irish Grover',
			'css-name' => 'Irish+Grover'
		), 
		'313' => array (
			'font-family' => 'font-family: "Istok Web";',
			'font-name' => 'Istok Web',
			'css-name' => 'Istok+Web'
		), 
		'314' => array (
			'font-family' => 'font-family: "Italiana";',
			'font-name' => 'Italiana',
			'css-name' => 'Italiana'
		), 
		'315' => array (
			'font-family' => 'font-family: "Italianno";',
			'font-name' => 'Italianno',
			'css-name' => 'Italianno'
		), 
		'316' => array (
			'font-family' => 'font-family: "Jacques Francois";',
			'font-name' => 'Jacques Francois',
			'css-name' => 'Jacques+Francois'
		), 
		'317' => array (
			'font-family' => 'font-family: "Jacques Francois Shadow";',
			'font-name' => 'Jacques Francois Shadow',
			'css-name' => 'Jacques+Francois+Shadow'
		), 
		'318' => array (
			'font-family' => 'font-family: "Jim Nightshade";',
			'font-name' => 'Jim Nightshade',
			'css-name' => 'Jim+Nightshade'
		), 
		'319' => array (
			'font-family' => 'font-family: "Jockey One";',
			'font-name' => 'Jockey One',
			'css-name' => 'Jockey+One'
		), 
		'320' => array (
			'font-family' => 'font-family: "Jolly Lodger";',
			'font-name' => 'Jolly Lodger',
			'css-name' => 'Jolly+Lodger'
		), 
		'321' => array (
			'font-family' => 'font-family: "Josefin Sans";',
			'font-name' => 'Josefin Sans',
			'css-name' => 'Josefin+Sans'
		), 
		'322' => array (
			'font-family' => 'font-family: "Josefin Slab";',
			'font-name' => 'Josefin Slab',
			'css-name' => 'Josefin+Slab'
		), 
		'323' => array (
			'font-family' => 'font-family: "Joti One";',
			'font-name' => 'Joti One',
			'css-name' => 'Joti+One'
		), 
		'324' => array (
			'font-family' => 'font-family: "Judson";',
			'font-name' => 'Judson',
			'css-name' => 'Judson'
		), 
		'325' => array (
			'font-family' => 'font-family: "Julee";',
			'font-name' => 'Julee',
			'css-name' => 'Julee'
		), 
		'326' => array (
			'font-family' => 'font-family: "Julius Sans One";',
			'font-name' => 'Julius Sans One',
			'css-name' => 'Julius+Sans+One'
		), 
		'327' => array (
			'font-family' => 'font-family: "Junge";',
			'font-name' => 'Junge',
			'css-name' => 'Junge'
		), 
		'328' => array (
			'font-family' => 'font-family: "Jura";',
			'font-name' => 'Jura',
			'css-name' => 'Jura'
		), 
		'329' => array (
			'font-family' => 'font-family: "Just Another Hand";',
			'font-name' => 'Just Another Hand',
			'css-name' => 'Just+Another+Hand'
		), 
		'330' => array (
			'font-family' => 'font-family: "Just Me Again Down Here";',
			'font-name' => 'Just Me Again Down Here',
			'css-name' => 'Just+Me+Again+Down+Here'
		), 
		'331' => array (
			'font-family' => 'font-family: "Kalam";',
			'font-name' => 'Kalam',
			'css-name' => 'Kalam'
		), 
		'332' => array (
			'font-family' => 'font-family: "Kameron";',
			'font-name' => 'Kameron',
			'css-name' => 'Kameron'
		), 
		'333' => array (
			'font-family' => 'font-family: "Kantumruy";',
			'font-name' => 'Kantumruy',
			'css-name' => 'Kantumruy'
		), 
		'334' => array (
			'font-family' => 'font-family: "Karla";',
			'font-name' => 'Karla',
			'css-name' => 'Karla'
		), 
		'335' => array (
			'font-family' => 'font-family: "Karma";',
			'font-name' => 'Karma',
			'css-name' => 'Karma'
		), 
		'336' => array (
			'font-family' => 'font-family: "Kaushan Script";',
			'font-name' => 'Kaushan Script',
			'css-name' => 'Kaushan+Script'
		), 
		'337' => array (
			'font-family' => 'font-family: "Kavoon";',
			'font-name' => 'Kavoon',
			'css-name' => 'Kavoon'
		), 
		'338' => array (
			'font-family' => 'font-family: "Kdam Thmor";',
			'font-name' => 'Kdam Thmor',
			'css-name' => 'Kdam+Thmor'
		), 
		'339' => array (
			'font-family' => 'font-family: "Keania One";',
			'font-name' => 'Keania One',
			'css-name' => 'Keania+One'
		), 
		'340' => array (
			'font-family' => 'font-family: "Kelly Slab";',
			'font-name' => 'Kelly Slab',
			'css-name' => 'Kelly+Slab'
		), 
		'341' => array (
			'font-family' => 'font-family: "Kenia";',
			'font-name' => 'Kenia',
			'css-name' => 'Kenia'
		), 
		'342' => array (
			'font-family' => 'font-family: "Khand";',
			'font-name' => 'Khand',
			'css-name' => 'Khand'
		), 
		'343' => array (
			'font-family' => 'font-family: "Khmer";',
			'font-name' => 'Khmer',
			'css-name' => 'Khmer'
		), 
		'344' => array (
			'font-family' => 'font-family: "Khula";',
			'font-name' => 'Khula',
			'css-name' => 'Khula'
		), 
		'345' => array (
			'font-family' => 'font-family: "Kite One";',
			'font-name' => 'Kite One',
			'css-name' => 'Kite+One'
		), 
		'346' => array (
			'font-family' => 'font-family: "Knewave";',
			'font-name' => 'Knewave',
			'css-name' => 'Knewave'
		), 
		'347' => array (
			'font-family' => 'font-family: "Kotta One";',
			'font-name' => 'Kotta One',
			'css-name' => 'Kotta+One'
		), 
		'348' => array (
			'font-family' => 'font-family: "Koulen";',
			'font-name' => 'Koulen',
			'css-name' => 'Koulen'
		), 
		'349' => array (
			'font-family' => 'font-family: "Kranky";',
			'font-name' => 'Kranky',
			'css-name' => 'Kranky'
		), 
		'350' => array (
			'font-family' => 'font-family: "Kreon";',
			'font-name' => 'Kreon',
			'css-name' => 'Kreon'
		), 
		'351' => array (
			'font-family' => 'font-family: "Kristi";',
			'font-name' => 'Kristi',
			'css-name' => 'Kristi'
		), 
		'352' => array (
			'font-family' => 'font-family: "Krona One";',
			'font-name' => 'Krona One',
			'css-name' => 'Krona+One'
		), 
		'353' => array (
			'font-family' => 'font-family: "La Belle Aurore";',
			'font-name' => 'La Belle Aurore',
			'css-name' => 'La+Belle+Aurore'
		), 
		'354' => array (
			'font-family' => 'font-family: "Laila";',
			'font-name' => 'Laila',
			'css-name' => 'Laila'
		), 
		'355' => array (
			'font-family' => 'font-family: "Lakki Reddy";',
			'font-name' => 'Lakki Reddy',
			'css-name' => 'Lakki+Reddy'
		), 
		'356' => array (
			'font-family' => 'font-family: "Lancelot";',
			'font-name' => 'Lancelot',
			'css-name' => 'Lancelot'
		), 
		'357' => array (
			'font-family' => 'font-family: "Lato";',
			'font-name' => 'Lato',
			'css-name' => 'Lato'
		), 
		'358' => array (
			'font-family' => 'font-family: "League Script";',
			'font-name' => 'League Script',
			'css-name' => 'League+Script'
		), 
		'359' => array (
			'font-family' => 'font-family: "Leckerli One";',
			'font-name' => 'Leckerli One',
			'css-name' => 'Leckerli+One'
		), 
		'360' => array (
			'font-family' => 'font-family: "Ledger";',
			'font-name' => 'Ledger',
			'css-name' => 'Ledger'
		), 
		'361' => array (
			'font-family' => 'font-family: "Lekton";',
			'font-name' => 'Lekton',
			'css-name' => 'Lekton'
		), 
		'362' => array (
			'font-family' => 'font-family: "Lemon";',
			'font-name' => 'Lemon',
			'css-name' => 'Lemon'
		), 
		'363' => array (
			'font-family' => 'font-family: "Libre Baskerville";',
			'font-name' => 'Libre Baskerville',
			'css-name' => 'Libre+Baskerville'
		), 
		'364' => array (
			'font-family' => 'font-family: "Life Savers";',
			'font-name' => 'Life Savers',
			'css-name' => 'Life+Savers'
		), 
		'365' => array (
			'font-family' => 'font-family: "Lilita One";',
			'font-name' => 'Lilita One',
			'css-name' => 'Lilita+One'
		), 
		'366' => array (
			'font-family' => 'font-family: "Lily Script One";',
			'font-name' => 'Lily Script One',
			'css-name' => 'Lily+Script+One'
		), 
		'367' => array (
			'font-family' => 'font-family: "Limelight";',
			'font-name' => 'Limelight',
			'css-name' => 'Limelight'
		), 
		'368' => array (
			'font-family' => 'font-family: "Linden Hill";',
			'font-name' => 'Linden Hill',
			'css-name' => 'Linden+Hill'
		), 
		'369' => array (
			'font-family' => 'font-family: "Lobster";',
			'font-name' => 'Lobster',
			'css-name' => 'Lobster'
		), 
		'370' => array (
			'font-family' => 'font-family: "Lobster Two";',
			'font-name' => 'Lobster Two',
			'css-name' => 'Lobster+Two'
		), 
		'371' => array (
			'font-family' => 'font-family: "Londrina Outline";',
			'font-name' => 'Londrina Outline',
			'css-name' => 'Londrina+Outline'
		), 
		'372' => array (
			'font-family' => 'font-family: "Londrina Shadow";',
			'font-name' => 'Londrina Shadow',
			'css-name' => 'Londrina+Shadow'
		), 
		'373' => array (
			'font-family' => 'font-family: "Londrina Sketch";',
			'font-name' => 'Londrina Sketch',
			'css-name' => 'Londrina+Sketch'
		), 
		'374' => array (
			'font-family' => 'font-family: "Londrina Solid";',
			'font-name' => 'Londrina Solid',
			'css-name' => 'Londrina+Solid'
		), 
		'375' => array (
			'font-family' => 'font-family: "Lora";',
			'font-name' => 'Lora',
			'css-name' => 'Lora'
		), 
		'376' => array (
			'font-family' => 'font-family: "Love Ya Like A Sister";',
			'font-name' => 'Love Ya Like A Sister',
			'css-name' => 'Love+Ya+Like+A+Sister'
		), 
		'377' => array (
			'font-family' => 'font-family: "Loved by the King";',
			'font-name' => 'Loved by the King',
			'css-name' => 'Loved+by+the+King'
		), 
		'378' => array (
			'font-family' => 'font-family: "Lovers Quarrel";',
			'font-name' => 'Lovers Quarrel',
			'css-name' => 'Lovers+Quarrel'
		), 
		'379' => array (
			'font-family' => 'font-family: "Luckiest Guy";',
			'font-name' => 'Luckiest Guy',
			'css-name' => 'Luckiest+Guy'
		), 
		'380' => array (
			'font-family' => 'font-family: "Lusitana";',
			'font-name' => 'Lusitana',
			'css-name' => 'Lusitana'
		), 
		'381' => array (
			'font-family' => 'font-family: "Lustria";',
			'font-name' => 'Lustria',
			'css-name' => 'Lustria'
		), 
		'382' => array (
			'font-family' => 'font-family: "Macondo";',
			'font-name' => 'Macondo',
			'css-name' => 'Macondo'
		), 
		'383' => array (
			'font-family' => 'font-family: "Macondo Swash Caps";',
			'font-name' => 'Macondo Swash Caps',
			'css-name' => 'Macondo+Swash+Caps'
		), 
		'384' => array (
			'font-family' => 'font-family: "Magra";',
			'font-name' => 'Magra',
			'css-name' => 'Magra'
		), 
		'385' => array (
			'font-family' => 'font-family: "Maiden Orange";',
			'font-name' => 'Maiden Orange',
			'css-name' => 'Maiden+Orange'
		), 
		'386' => array (
			'font-family' => 'font-family: "Mako";',
			'font-name' => 'Mako',
			'css-name' => 'Mako'
		), 
		'387' => array (
			'font-family' => 'font-family: "Mallanna";',
			'font-name' => 'Mallanna',
			'css-name' => 'Mallanna'
		), 
		'388' => array (
			'font-family' => 'font-family: "Mandali";',
			'font-name' => 'Mandali',
			'css-name' => 'Mandali'
		), 
		'389' => array (
			'font-family' => 'font-family: "Marcellus";',
			'font-name' => 'Marcellus',
			'css-name' => 'Marcellus'
		), 
		'390' => array (
			'font-family' => 'font-family: "Marcellus SC";',
			'font-name' => 'Marcellus SC',
			'css-name' => 'Marcellus+SC'
		), 
		'391' => array (
			'font-family' => 'font-family: "Marck Script";',
			'font-name' => 'Marck Script',
			'css-name' => 'Marck+Script'
		), 
		'392' => array (
			'font-family' => 'font-family: "Margarine";',
			'font-name' => 'Margarine',
			'css-name' => 'Margarine'
		), 
		'393' => array (
			'font-family' => 'font-family: "Marko One";',
			'font-name' => 'Marko One',
			'css-name' => 'Marko+One'
		), 
		'394' => array (
			'font-family' => 'font-family: "Marmelad";',
			'font-name' => 'Marmelad',
			'css-name' => 'Marmelad'
		), 
		'395' => array (
			'font-family' => 'font-family: "Marvel";',
			'font-name' => 'Marvel',
			'css-name' => 'Marvel'
		), 
		'396' => array (
			'font-family' => 'font-family: "Mate";',
			'font-name' => 'Mate',
			'css-name' => 'Mate'
		), 
		'397' => array (
			'font-family' => 'font-family: "Mate SC";',
			'font-name' => 'Mate SC',
			'css-name' => 'Mate+SC'
		), 
		'398' => array (
			'font-family' => 'font-family: "Maven Pro";',
			'font-name' => 'Maven Pro',
			'css-name' => 'Maven+Pro'
		), 
		'399' => array (
			'font-family' => 'font-family: "McLaren";',
			'font-name' => 'McLaren',
			'css-name' => 'McLaren'
		), 
		'400' => array (
			'font-family' => 'font-family: "Meddon";',
			'font-name' => 'Meddon',
			'css-name' => 'Meddon'
		), 
		'401' => array (
			'font-family' => 'font-family: "MedievalSharp";',
			'font-name' => 'MedievalSharp',
			'css-name' => 'MedievalSharp'
		), 
		'402' => array (
			'font-family' => 'font-family: "Medula One";',
			'font-name' => 'Medula One',
			'css-name' => 'Medula+One'
		), 
		'403' => array (
			'font-family' => 'font-family: "Megrim";',
			'font-name' => 'Megrim',
			'css-name' => 'Megrim'
		), 
		'404' => array (
			'font-family' => 'font-family: "Meie Script";',
			'font-name' => 'Meie Script',
			'css-name' => 'Meie+Script'
		), 
		'405' => array (
			'font-family' => 'font-family: "Merienda";',
			'font-name' => 'Merienda',
			'css-name' => 'Merienda'
		), 
		'406' => array (
			'font-family' => 'font-family: "Merienda One";',
			'font-name' => 'Merienda One',
			'css-name' => 'Merienda+One'
		), 
		'407' => array (
			'font-family' => 'font-family: "Merriweather";',
			'font-name' => 'Merriweather',
			'css-name' => 'Merriweather'
		), 
		'408' => array (
			'font-family' => 'font-family: "Merriweather Sans";',
			'font-name' => 'Merriweather Sans',
			'css-name' => 'Merriweather+Sans'
		), 
		'409' => array (
			'font-family' => 'font-family: "Metal";',
			'font-name' => 'Metal',
			'css-name' => 'Metal'
		), 
		'410' => array (
			'font-family' => 'font-family: "Metal Mania";',
			'font-name' => 'Metal Mania',
			'css-name' => 'Metal+Mania'
		), 
		'411' => array (
			'font-family' => 'font-family: "Metamorphous";',
			'font-name' => 'Metamorphous',
			'css-name' => 'Metamorphous'
		), 
		'412' => array (
			'font-family' => 'font-family: "Metrophobic";',
			'font-name' => 'Metrophobic',
			'css-name' => 'Metrophobic'
		), 
		'413' => array (
			'font-family' => 'font-family: "Michroma";',
			'font-name' => 'Michroma',
			'css-name' => 'Michroma'
		), 
		'414' => array (
			'font-family' => 'font-family: "Milonga";',
			'font-name' => 'Milonga',
			'css-name' => 'Milonga'
		), 
		'415' => array (
			'font-family' => 'font-family: "Miltonian";',
			'font-name' => 'Miltonian',
			'css-name' => 'Miltonian'
		), 
		'416' => array (
			'font-family' => 'font-family: "Miltonian Tattoo";',
			'font-name' => 'Miltonian Tattoo',
			'css-name' => 'Miltonian+Tattoo'
		), 
		'417' => array (
			'font-family' => 'font-family: "Miniver";',
			'font-name' => 'Miniver',
			'css-name' => 'Miniver'
		), 
		'418' => array (
			'font-family' => 'font-family: "Miss Fajardose";',
			'font-name' => 'Miss Fajardose',
			'css-name' => 'Miss+Fajardose'
		), 
		'419' => array (
			'font-family' => 'font-family: "Modern Antiqua";',
			'font-name' => 'Modern Antiqua',
			'css-name' => 'Modern+Antiqua'
		), 
		'420' => array (
			'font-family' => 'font-family: "Molengo";',
			'font-name' => 'Molengo',
			'css-name' => 'Molengo'
		), 
		'421' => array (
			'font-family' => 'font-family: "Molle";',
			'font-name' => 'Molle',
			'css-name' => 'Molle'
		), 
		'422' => array (
			'font-family' => 'font-family: "Monda";',
			'font-name' => 'Monda',
			'css-name' => 'Monda'
		), 
		'423' => array (
			'font-family' => 'font-family: "Monofett";',
			'font-name' => 'Monofett',
			'css-name' => 'Monofett'
		), 
		'424' => array (
			'font-family' => 'font-family: "Monoton";',
			'font-name' => 'Monoton',
			'css-name' => 'Monoton'
		), 
		'425' => array (
			'font-family' => 'font-family: "Monsieur La Doulaise";',
			'font-name' => 'Monsieur La Doulaise',
			'css-name' => 'Monsieur+La+Doulaise'
		), 
		'426' => array (
			'font-family' => 'font-family: "Montaga";',
			'font-name' => 'Montaga',
			'css-name' => 'Montaga'
		), 
		'427' => array (
			'font-family' => 'font-family: "Montez";',
			'font-name' => 'Montez',
			'css-name' => 'Montez'
		), 
		'428' => array (
			'font-family' => 'font-family: "Montserrat";',
			'font-name' => 'Montserrat',
			'css-name' => 'Montserrat'
		), 
		'429' => array (
			'font-family' => 'font-family: "Montserrat Alternates";',
			'font-name' => 'Montserrat Alternates',
			'css-name' => 'Montserrat+Alternates'
		), 
		'430' => array (
			'font-family' => 'font-family: "Montserrat Subrayada";',
			'font-name' => 'Montserrat Subrayada',
			'css-name' => 'Montserrat+Subrayada'
		), 
		'431' => array (
			'font-family' => 'font-family: "Moul";',
			'font-name' => 'Moul',
			'css-name' => 'Moul'
		), 
		'432' => array (
			'font-family' => 'font-family: "Moulpali";',
			'font-name' => 'Moulpali',
			'css-name' => 'Moulpali'
		), 
		'433' => array (
			'font-family' => 'font-family: "Mountains of Christmas";',
			'font-name' => 'Mountains of Christmas',
			'css-name' => 'Mountains+of+Christmas'
		), 
		'434' => array (
			'font-family' => 'font-family: "Mouse Memoirs";',
			'font-name' => 'Mouse Memoirs',
			'css-name' => 'Mouse+Memoirs'
		), 
		'435' => array (
			'font-family' => 'font-family: "Mr Bedfort";',
			'font-name' => 'Mr Bedfort',
			'css-name' => 'Mr+Bedfort'
		), 
		'436' => array (
			'font-family' => 'font-family: "Mr Dafoe";',
			'font-name' => 'Mr Dafoe',
			'css-name' => 'Mr+Dafoe'
		), 
		'437' => array (
			'font-family' => 'font-family: "Mr De Haviland";',
			'font-name' => 'Mr De Haviland',
			'css-name' => 'Mr+De+Haviland'
		), 
		'438' => array (
			'font-family' => 'font-family: "Mrs Saint Delafield";',
			'font-name' => 'Mrs Saint Delafield',
			'css-name' => 'Mrs+Saint+Delafield'
		), 
		'439' => array (
			'font-family' => 'font-family: "Mrs Sheppards";',
			'font-name' => 'Mrs Sheppards',
			'css-name' => 'Mrs+Sheppards'
		), 
		'440' => array (
			'font-family' => 'font-family: "Muli";',
			'font-name' => 'Muli',
			'css-name' => 'Muli'
		), 
		'441' => array (
			'font-family' => 'font-family: "Mystery Quest";',
			'font-name' => 'Mystery Quest',
			'css-name' => 'Mystery+Quest'
		), 
		'442' => array (
			'font-family' => 'font-family: "NTR";',
			'font-name' => 'NTR',
			'css-name' => 'NTR'
		), 
		'443' => array (
			'font-family' => 'font-family: "Neucha";',
			'font-name' => 'Neucha',
			'css-name' => 'Neucha'
		), 
		'444' => array (
			'font-family' => 'font-family: "Neuton";',
			'font-name' => 'Neuton',
			'css-name' => 'Neuton'
		), 
		'445' => array (
			'font-family' => 'font-family: "New Rocker";',
			'font-name' => 'New Rocker',
			'css-name' => 'New+Rocker'
		), 
		'446' => array (
			'font-family' => 'font-family: "News Cycle";',
			'font-name' => 'News Cycle',
			'css-name' => 'News+Cycle'
		), 
		'447' => array (
			'font-family' => 'font-family: "Niconne";',
			'font-name' => 'Niconne',
			'css-name' => 'Niconne'
		), 
		'448' => array (
			'font-family' => 'font-family: "Nixie One";',
			'font-name' => 'Nixie One',
			'css-name' => 'Nixie+One'
		), 
		'449' => array (
			'font-family' => 'font-family: "Nobile";',
			'font-name' => 'Nobile',
			'css-name' => 'Nobile'
		), 
		'450' => array (
			'font-family' => 'font-family: "Nokora";',
			'font-name' => 'Nokora',
			'css-name' => 'Nokora'
		), 
		'451' => array (
			'font-family' => 'font-family: "Norican";',
			'font-name' => 'Norican',
			'css-name' => 'Norican'
		), 
		'452' => array (
			'font-family' => 'font-family: "Nosifer";',
			'font-name' => 'Nosifer',
			'css-name' => 'Nosifer'
		), 
		'453' => array (
			'font-family' => 'font-family: "Nothing You Could Do";',
			'font-name' => 'Nothing You Could Do',
			'css-name' => 'Nothing+You+Could+Do'
		), 
		'454' => array (
			'font-family' => 'font-family: "Noticia Text";',
			'font-name' => 'Noticia Text',
			'css-name' => 'Noticia+Text'
		), 
		'455' => array (
			'font-family' => 'font-family: "Noto Sans";',
			'font-name' => 'Noto Sans',
			'css-name' => 'Noto+Sans'
		), 
		'456' => array (
			'font-family' => 'font-family: "Noto Serif";',
			'font-name' => 'Noto Serif',
			'css-name' => 'Noto+Serif'
		), 
		'457' => array (
			'font-family' => 'font-family: "Nova Cut";',
			'font-name' => 'Nova Cut',
			'css-name' => 'Nova+Cut'
		), 
		'458' => array (
			'font-family' => 'font-family: "Nova Flat";',
			'font-name' => 'Nova Flat',
			'css-name' => 'Nova+Flat'
		), 
		'459' => array (
			'font-family' => 'font-family: "Nova Mono";',
			'font-name' => 'Nova Mono',
			'css-name' => 'Nova+Mono'
		), 
		'460' => array (
			'font-family' => 'font-family: "Nova Oval";',
			'font-name' => 'Nova Oval',
			'css-name' => 'Nova+Oval'
		), 
		'461' => array (
			'font-family' => 'font-family: "Nova Round";',
			'font-name' => 'Nova Round',
			'css-name' => 'Nova+Round'
		), 
		'462' => array (
			'font-family' => 'font-family: "Nova Script";',
			'font-name' => 'Nova Script',
			'css-name' => 'Nova+Script'
		), 
		'463' => array (
			'font-family' => 'font-family: "Nova Slim";',
			'font-name' => 'Nova Slim',
			'css-name' => 'Nova+Slim'
		), 
		'464' => array (
			'font-family' => 'font-family: "Nova Square";',
			'font-name' => 'Nova Square',
			'css-name' => 'Nova+Square'
		), 
		'465' => array (
			'font-family' => 'font-family: "Numans";',
			'font-name' => 'Numans',
			'css-name' => 'Numans'
		), 
		'466' => array (
			'font-family' => 'font-family: "Nunito";',
			'font-name' => 'Nunito',
			'css-name' => 'Nunito'
		), 
		'467' => array (
			'font-family' => 'font-family: "Odor Mean Chey";',
			'font-name' => 'Odor Mean Chey',
			'css-name' => 'Odor+Mean+Chey'
		), 
		'468' => array (
			'font-family' => 'font-family: "Offside";',
			'font-name' => 'Offside',
			'css-name' => 'Offside'
		), 
		'469' => array (
			'font-family' => 'font-family: "Old Standard TT";',
			'font-name' => 'Old Standard TT',
			'css-name' => 'Old+Standard+TT'
		), 
		'470' => array (
			'font-family' => 'font-family: "Oldenburg";',
			'font-name' => 'Oldenburg',
			'css-name' => 'Oldenburg'
		), 
		'471' => array (
			'font-family' => 'font-family: "Oleo Script";',
			'font-name' => 'Oleo Script',
			'css-name' => 'Oleo+Script'
		), 
		'472' => array (
			'font-family' => 'font-family: "Oleo Script Swash Caps";',
			'font-name' => 'Oleo Script Swash Caps',
			'css-name' => 'Oleo+Script+Swash+Caps'
		), 
		'473' => array (
			'font-family' => 'font-family: "Open Sans";',
			'font-name' => 'Open Sans',
			'css-name' => 'Open+Sans'
		), 
		'474' => array (
			'font-family' => 'font-family: "Open Sans Condensed";',
			'font-name' => 'Open Sans Condensed',
			'css-name' => 'Open+Sans+Condensed'
		), 
		'475' => array (
			'font-family' => 'font-family: "Oranienbaum";',
			'font-name' => 'Oranienbaum',
			'css-name' => 'Oranienbaum'
		), 
		'476' => array (
			'font-family' => 'font-family: "Orbitron";',
			'font-name' => 'Orbitron',
			'css-name' => 'Orbitron'
		), 
		'477' => array (
			'font-family' => 'font-family: "Oregano";',
			'font-name' => 'Oregano',
			'css-name' => 'Oregano'
		), 
		'478' => array (
			'font-family' => 'font-family: "Orienta";',
			'font-name' => 'Orienta',
			'css-name' => 'Orienta'
		), 
		'479' => array (
			'font-family' => 'font-family: "Original Surfer";',
			'font-name' => 'Original Surfer',
			'css-name' => 'Original+Surfer'
		), 
		'480' => array (
			'font-family' => 'font-family: "Oswald";',
			'font-name' => 'Oswald',
			'css-name' => 'Oswald'
		), 
		'481' => array (
			'font-family' => 'font-family: "Over the Rainbow";',
			'font-name' => 'Over the Rainbow',
			'css-name' => 'Over+the+Rainbow'
		), 
		'482' => array (
			'font-family' => 'font-family: "Overlock";',
			'font-name' => 'Overlock',
			'css-name' => 'Overlock'
		), 
		'483' => array (
			'font-family' => 'font-family: "Overlock SC";',
			'font-name' => 'Overlock SC',
			'css-name' => 'Overlock+SC'
		), 
		'484' => array (
			'font-family' => 'font-family: "Ovo";',
			'font-name' => 'Ovo',
			'css-name' => 'Ovo'
		), 
		'485' => array (
			'font-family' => 'font-family: "Oxygen";',
			'font-name' => 'Oxygen',
			'css-name' => 'Oxygen'
		), 
		'486' => array (
			'font-family' => 'font-family: "Oxygen Mono";',
			'font-name' => 'Oxygen Mono',
			'css-name' => 'Oxygen+Mono'
		), 
		'487' => array (
			'font-family' => 'font-family: "PT Mono";',
			'font-name' => 'PT Mono',
			'css-name' => 'PT+Mono'
		), 
		'488' => array (
			'font-family' => 'font-family: "PT Sans";',
			'font-name' => 'PT Sans',
			'css-name' => 'PT+Sans'
		), 
		'489' => array (
			'font-family' => 'font-family: "PT Sans Caption";',
			'font-name' => 'PT Sans Caption',
			'css-name' => 'PT+Sans+Caption'
		), 
		'490' => array (
			'font-family' => 'font-family: "PT Sans Narrow";',
			'font-name' => 'PT Sans Narrow',
			'css-name' => 'PT+Sans+Narrow'
		), 
		'491' => array (
			'font-family' => 'font-family: "PT Serif";',
			'font-name' => 'PT Serif',
			'css-name' => 'PT+Serif'
		), 
		'492' => array (
			'font-family' => 'font-family: "PT Serif Caption";',
			'font-name' => 'PT Serif Caption',
			'css-name' => 'PT+Serif+Caption'
		), 
		'493' => array (
			'font-family' => 'font-family: "Pacifico";',
			'font-name' => 'Pacifico',
			'css-name' => 'Pacifico'
		), 
		'494' => array (
			'font-family' => 'font-family: "Paprika";',
			'font-name' => 'Paprika',
			'css-name' => 'Paprika'
		), 
		'495' => array (
			'font-family' => 'font-family: "Parisienne";',
			'font-name' => 'Parisienne',
			'css-name' => 'Parisienne'
		), 
		'496' => array (
			'font-family' => 'font-family: "Passero One";',
			'font-name' => 'Passero One',
			'css-name' => 'Passero+One'
		), 
		'497' => array (
			'font-family' => 'font-family: "Passion One";',
			'font-name' => 'Passion One',
			'css-name' => 'Passion+One'
		), 
		'498' => array (
			'font-family' => 'font-family: "Pathway Gothic One";',
			'font-name' => 'Pathway Gothic One',
			'css-name' => 'Pathway+Gothic+One'
		), 
		'499' => array (
			'font-family' => 'font-family: "Patrick Hand";',
			'font-name' => 'Patrick Hand',
			'css-name' => 'Patrick+Hand'
		), 
		'500' => array (
			'font-family' => 'font-family: "Patrick Hand SC";',
			'font-name' => 'Patrick Hand SC',
			'css-name' => 'Patrick+Hand+SC'
		), 
		'501' => array (
			'font-family' => 'font-family: "Patua One";',
			'font-name' => 'Patua One',
			'css-name' => 'Patua+One'
		), 
		'502' => array (
			'font-family' => 'font-family: "Paytone One";',
			'font-name' => 'Paytone One',
			'css-name' => 'Paytone+One'
		), 
		'503' => array (
			'font-family' => 'font-family: "Peddana";',
			'font-name' => 'Peddana',
			'css-name' => 'Peddana'
		), 
		'504' => array (
			'font-family' => 'font-family: "Peralta";',
			'font-name' => 'Peralta',
			'css-name' => 'Peralta'
		), 
		'505' => array (
			'font-family' => 'font-family: "Permanent Marker";',
			'font-name' => 'Permanent Marker',
			'css-name' => 'Permanent+Marker'
		), 
		'506' => array (
			'font-family' => 'font-family: "Petit Formal Script";',
			'font-name' => 'Petit Formal Script',
			'css-name' => 'Petit+Formal+Script'
		), 
		'507' => array (
			'font-family' => 'font-family: "Petrona";',
			'font-name' => 'Petrona',
			'css-name' => 'Petrona'
		), 
		'508' => array (
			'font-family' => 'font-family: "Philosopher";',
			'font-name' => 'Philosopher',
			'css-name' => 'Philosopher'
		), 
		'509' => array (
			'font-family' => 'font-family: "Piedra";',
			'font-name' => 'Piedra',
			'css-name' => 'Piedra'
		), 
		'510' => array (
			'font-family' => 'font-family: "Pinyon Script";',
			'font-name' => 'Pinyon Script',
			'css-name' => 'Pinyon+Script'
		), 
		'511' => array (
			'font-family' => 'font-family: "Pirata One";',
			'font-name' => 'Pirata One',
			'css-name' => 'Pirata+One'
		), 
		'512' => array (
			'font-family' => 'font-family: "Plaster";',
			'font-name' => 'Plaster',
			'css-name' => 'Plaster'
		), 
		'513' => array (
			'font-family' => 'font-family: "Play";',
			'font-name' => 'Play',
			'css-name' => 'Play'
		), 
		'514' => array (
			'font-family' => 'font-family: "Playball";',
			'font-name' => 'Playball',
			'css-name' => 'Playball'
		), 
		'515' => array (
			'font-family' => 'font-family: "Playfair Display";',
			'font-name' => 'Playfair Display',
			'css-name' => 'Playfair+Display'
		), 
		'516' => array (
			'font-family' => 'font-family: "Playfair Display SC";',
			'font-name' => 'Playfair Display SC',
			'css-name' => 'Playfair+Display+SC'
		), 
		'517' => array (
			'font-family' => 'font-family: "Podkova";',
			'font-name' => 'Podkova',
			'css-name' => 'Podkova'
		), 
		'518' => array (
			'font-family' => 'font-family: "Poiret One";',
			'font-name' => 'Poiret One',
			'css-name' => 'Poiret+One'
		), 
		'519' => array (
			'font-family' => 'font-family: "Poller One";',
			'font-name' => 'Poller One',
			'css-name' => 'Poller+One'
		), 
		'520' => array (
			'font-family' => 'font-family: "Poly";',
			'font-name' => 'Poly',
			'css-name' => 'Poly'
		), 
		'521' => array (
			'font-family' => 'font-family: "Pompiere";',
			'font-name' => 'Pompiere',
			'css-name' => 'Pompiere'
		), 
		'522' => array (
			'font-family' => 'font-family: "Pontano Sans";',
			'font-name' => 'Pontano Sans',
			'css-name' => 'Pontano+Sans'
		), 
		'523' => array (
			'font-family' => 'font-family: "Port Lligat Sans";',
			'font-name' => 'Port Lligat Sans',
			'css-name' => 'Port+Lligat+Sans'
		), 
		'524' => array (
			'font-family' => 'font-family: "Port Lligat Slab";',
			'font-name' => 'Port Lligat Slab',
			'css-name' => 'Port+Lligat+Slab'
		), 
		'525' => array (
			'font-family' => 'font-family: "Prata";',
			'font-name' => 'Prata',
			'css-name' => 'Prata'
		), 
		'526' => array (
			'font-family' => 'font-family: "Preahvihear";',
			'font-name' => 'Preahvihear',
			'css-name' => 'Preahvihear'
		), 
		'527' => array (
			'font-family' => 'font-family: "Press Start 2P";',
			'font-name' => 'Press Start 2P',
			'css-name' => 'Press+Start+2P'
		), 
		'528' => array (
			'font-family' => 'font-family: "Princess Sofia";',
			'font-name' => 'Princess Sofia',
			'css-name' => 'Princess+Sofia'
		), 
		'529' => array (
			'font-family' => 'font-family: "Prociono";',
			'font-name' => 'Prociono',
			'css-name' => 'Prociono'
		), 
		'530' => array (
			'font-family' => 'font-family: "Prosto One";',
			'font-name' => 'Prosto One',
			'css-name' => 'Prosto+One'
		), 
		'531' => array (
			'font-family' => 'font-family: "Puritan";',
			'font-name' => 'Puritan',
			'css-name' => 'Puritan'
		), 
		'532' => array (
			'font-family' => 'font-family: "Purple Purse";',
			'font-name' => 'Purple Purse',
			'css-name' => 'Purple+Purse'
		), 
		'533' => array (
			'font-family' => 'font-family: "Quando";',
			'font-name' => 'Quando',
			'css-name' => 'Quando'
		), 
		'534' => array (
			'font-family' => 'font-family: "Quantico";',
			'font-name' => 'Quantico',
			'css-name' => 'Quantico'
		), 
		'535' => array (
			'font-family' => 'font-family: "Quattrocento";',
			'font-name' => 'Quattrocento',
			'css-name' => 'Quattrocento'
		), 
		'536' => array (
			'font-family' => 'font-family: "Quattrocento Sans";',
			'font-name' => 'Quattrocento Sans',
			'css-name' => 'Quattrocento+Sans'
		), 
		'537' => array (
			'font-family' => 'font-family: "Questrial";',
			'font-name' => 'Questrial',
			'css-name' => 'Questrial'
		), 
		'538' => array (
			'font-family' => 'font-family: "Quicksand";',
			'font-name' => 'Quicksand',
			'css-name' => 'Quicksand'
		), 
		'539' => array (
			'font-family' => 'font-family: "Quintessential";',
			'font-name' => 'Quintessential',
			'css-name' => 'Quintessential'
		), 
		'540' => array (
			'font-family' => 'font-family: "Qwigley";',
			'font-name' => 'Qwigley',
			'css-name' => 'Qwigley'
		), 
		'541' => array (
			'font-family' => 'font-family: "Racing Sans One";',
			'font-name' => 'Racing Sans One',
			'css-name' => 'Racing+Sans+One'
		), 
		'542' => array (
			'font-family' => 'font-family: "Radley";',
			'font-name' => 'Radley',
			'css-name' => 'Radley'
		), 
		'543' => array (
			'font-family' => 'font-family: "Rajdhani";',
			'font-name' => 'Rajdhani',
			'css-name' => 'Rajdhani'
		), 
		'544' => array (
			'font-family' => 'font-family: "Raleway";',
			'font-name' => 'Raleway',
			'css-name' => 'Raleway'
		), 
		'545' => array (
			'font-family' => 'font-family: "Raleway Dots";',
			'font-name' => 'Raleway Dots',
			'css-name' => 'Raleway+Dots'
		), 
		'546' => array (
			'font-family' => 'font-family: "Ramabhadra";',
			'font-name' => 'Ramabhadra',
			'css-name' => 'Ramabhadra'
		), 
		'547' => array (
			'font-family' => 'font-family: "Ramaraja";',
			'font-name' => 'Ramaraja',
			'css-name' => 'Ramaraja'
		), 
		'548' => array (
			'font-family' => 'font-family: "Rambla";',
			'font-name' => 'Rambla',
			'css-name' => 'Rambla'
		), 
		'549' => array (
			'font-family' => 'font-family: "Rammetto One";',
			'font-name' => 'Rammetto One',
			'css-name' => 'Rammetto+One'
		), 
		'550' => array (
			'font-family' => 'font-family: "Ranchers";',
			'font-name' => 'Ranchers',
			'css-name' => 'Ranchers'
		), 
		'551' => array (
			'font-family' => 'font-family: "Rancho";',
			'font-name' => 'Rancho',
			'css-name' => 'Rancho'
		), 
		'552' => array (
			'font-family' => 'font-family: "Ranga";',
			'font-name' => 'Ranga',
			'css-name' => 'Ranga'
		), 
		'553' => array (
			'font-family' => 'font-family: "Rationale";',
			'font-name' => 'Rationale',
			'css-name' => 'Rationale'
		), 
		'554' => array (
			'font-family' => 'font-family: "Ravi Prakash";',
			'font-name' => 'Ravi Prakash',
			'css-name' => 'Ravi+Prakash'
		), 
		'555' => array (
			'font-family' => 'font-family: "Redressed";',
			'font-name' => 'Redressed',
			'css-name' => 'Redressed'
		), 
		'556' => array (
			'font-family' => 'font-family: "Reenie Beanie";',
			'font-name' => 'Reenie Beanie',
			'css-name' => 'Reenie+Beanie'
		), 
		'557' => array (
			'font-family' => 'font-family: "Revalia";',
			'font-name' => 'Revalia',
			'css-name' => 'Revalia'
		), 
		'558' => array (
			'font-family' => 'font-family: "Ribeye";',
			'font-name' => 'Ribeye',
			'css-name' => 'Ribeye'
		), 
		'559' => array (
			'font-family' => 'font-family: "Ribeye Marrow";',
			'font-name' => 'Ribeye Marrow',
			'css-name' => 'Ribeye+Marrow'
		), 
		'560' => array (
			'font-family' => 'font-family: "Righteous";',
			'font-name' => 'Righteous',
			'css-name' => 'Righteous'
		), 
		'561' => array (
			'font-family' => 'font-family: "Risque";',
			'font-name' => 'Risque',
			'css-name' => 'Risque'
		), 
		'562' => array (
			'font-family' => 'font-family: "Roboto";',
			'font-name' => 'Roboto',
			'css-name' => 'Roboto'
		), 
		'563' => array (
			'font-family' => 'font-family: "Roboto Condensed";',
			'font-name' => 'Roboto Condensed',
			'css-name' => 'Roboto+Condensed'
		), 
		'564' => array (
			'font-family' => 'font-family: "Roboto Slab";',
			'font-name' => 'Roboto Slab',
			'css-name' => 'Roboto+Slab'
		), 
		'565' => array (
			'font-family' => 'font-family: "Rochester";',
			'font-name' => 'Rochester',
			'css-name' => 'Rochester'
		), 
		'566' => array (
			'font-family' => 'font-family: "Rock Salt";',
			'font-name' => 'Rock Salt',
			'css-name' => 'Rock+Salt'
		), 
		'567' => array (
			'font-family' => 'font-family: "Rokkitt";',
			'font-name' => 'Rokkitt',
			'css-name' => 'Rokkitt'
		), 
		'568' => array (
			'font-family' => 'font-family: "Romanesco";',
			'font-name' => 'Romanesco',
			'css-name' => 'Romanesco'
		), 
		'569' => array (
			'font-family' => 'font-family: "Ropa Sans";',
			'font-name' => 'Ropa Sans',
			'css-name' => 'Ropa+Sans'
		), 
		'570' => array (
			'font-family' => 'font-family: "Rosario";',
			'font-name' => 'Rosario',
			'css-name' => 'Rosario'
		), 
		'571' => array (
			'font-family' => 'font-family: "Rosarivo";',
			'font-name' => 'Rosarivo',
			'css-name' => 'Rosarivo'
		), 
		'572' => array (
			'font-family' => 'font-family: "Rouge Script";',
			'font-name' => 'Rouge Script',
			'css-name' => 'Rouge+Script'
		), 
		'573' => array (
			'font-family' => 'font-family: "Rozha One";',
			'font-name' => 'Rozha One',
			'css-name' => 'Rozha+One'
		), 
		'574' => array (
			'font-family' => 'font-family: "Rubik Mono One";',
			'font-name' => 'Rubik Mono One',
			'css-name' => 'Rubik+Mono+One'
		), 
		'575' => array (
			'font-family' => 'font-family: "Rubik One";',
			'font-name' => 'Rubik One',
			'css-name' => 'Rubik+One'
		), 
		'576' => array (
			'font-family' => 'font-family: "Ruda";',
			'font-name' => 'Ruda',
			'css-name' => 'Ruda'
		), 
		'577' => array (
			'font-family' => 'font-family: "Rufina";',
			'font-name' => 'Rufina',
			'css-name' => 'Rufina'
		), 
		'578' => array (
			'font-family' => 'font-family: "Ruge Boogie";',
			'font-name' => 'Ruge Boogie',
			'css-name' => 'Ruge+Boogie'
		), 
		'579' => array (
			'font-family' => 'font-family: "Ruluko";',
			'font-name' => 'Ruluko',
			'css-name' => 'Ruluko'
		), 
		'580' => array (
			'font-family' => 'font-family: "Rum Raisin";',
			'font-name' => 'Rum Raisin',
			'css-name' => 'Rum+Raisin'
		), 
		'581' => array (
			'font-family' => 'font-family: "Ruslan Display";',
			'font-name' => 'Ruslan Display',
			'css-name' => 'Ruslan+Display'
		), 
		'582' => array (
			'font-family' => 'font-family: "Russo One";',
			'font-name' => 'Russo One',
			'css-name' => 'Russo+One'
		), 
		'583' => array (
			'font-family' => 'font-family: "Ruthie";',
			'font-name' => 'Ruthie',
			'css-name' => 'Ruthie'
		), 
		'584' => array (
			'font-family' => 'font-family: "Rye";',
			'font-name' => 'Rye',
			'css-name' => 'Rye'
		), 
		'585' => array (
			'font-family' => 'font-family: "Sacramento";',
			'font-name' => 'Sacramento',
			'css-name' => 'Sacramento'
		), 
		'586' => array (
			'font-family' => 'font-family: "Sail";',
			'font-name' => 'Sail',
			'css-name' => 'Sail'
		), 
		'587' => array (
			'font-family' => 'font-family: "Salsa";',
			'font-name' => 'Salsa',
			'css-name' => 'Salsa'
		), 
		'588' => array (
			'font-family' => 'font-family: "Sanchez";',
			'font-name' => 'Sanchez',
			'css-name' => 'Sanchez'
		), 
		'589' => array (
			'font-family' => 'font-family: "Sancreek";',
			'font-name' => 'Sancreek',
			'css-name' => 'Sancreek'
		), 
		'590' => array (
			'font-family' => 'font-family: "Sansita One";',
			'font-name' => 'Sansita One',
			'css-name' => 'Sansita+One'
		), 
		'591' => array (
			'font-family' => 'font-family: "Sarina";',
			'font-name' => 'Sarina',
			'css-name' => 'Sarina'
		), 
		'592' => array (
			'font-family' => 'font-family: "Sarpanch";',
			'font-name' => 'Sarpanch',
			'css-name' => 'Sarpanch'
		), 
		'593' => array (
			'font-family' => 'font-family: "Satisfy";',
			'font-name' => 'Satisfy',
			'css-name' => 'Satisfy'
		), 
		'594' => array (
			'font-family' => 'font-family: "Scada";',
			'font-name' => 'Scada',
			'css-name' => 'Scada'
		), 
		'595' => array (
			'font-family' => 'font-family: "Schoolbell";',
			'font-name' => 'Schoolbell',
			'css-name' => 'Schoolbell'
		), 
		'596' => array (
			'font-family' => 'font-family: "Seaweed Script";',
			'font-name' => 'Seaweed Script',
			'css-name' => 'Seaweed+Script'
		), 
		'597' => array (
			'font-family' => 'font-family: "Sevillana";',
			'font-name' => 'Sevillana',
			'css-name' => 'Sevillana'
		), 
		'598' => array (
			'font-family' => 'font-family: "Seymour One";',
			'font-name' => 'Seymour One',
			'css-name' => 'Seymour+One'
		), 
		'599' => array (
			'font-family' => 'font-family: "Shadows Into Light";',
			'font-name' => 'Shadows Into Light',
			'css-name' => 'Shadows+Into+Light'
		), 
		'600' => array (
			'font-family' => 'font-family: "Shadows Into Light Two";',
			'font-name' => 'Shadows Into Light Two',
			'css-name' => 'Shadows+Into+Light+Two'
		), 
		'601' => array (
			'font-family' => 'font-family: "Shanti";',
			'font-name' => 'Shanti',
			'css-name' => 'Shanti'
		), 
		'602' => array (
			'font-family' => 'font-family: "Share";',
			'font-name' => 'Share',
			'css-name' => 'Share'
		), 
		'603' => array (
			'font-family' => 'font-family: "Share Tech";',
			'font-name' => 'Share Tech',
			'css-name' => 'Share+Tech'
		), 
		'604' => array (
			'font-family' => 'font-family: "Share Tech Mono";',
			'font-name' => 'Share Tech Mono',
			'css-name' => 'Share+Tech+Mono'
		), 
		'605' => array (
			'font-family' => 'font-family: "Shojumaru";',
			'font-name' => 'Shojumaru',
			'css-name' => 'Shojumaru'
		), 
		'606' => array (
			'font-family' => 'font-family: "Short Stack";',
			'font-name' => 'Short Stack',
			'css-name' => 'Short+Stack'
		), 
		'607' => array (
			'font-family' => 'font-family: "Siemreap";',
			'font-name' => 'Siemreap',
			'css-name' => 'Siemreap'
		), 
		'608' => array (
			'font-family' => 'font-family: "Sigmar One";',
			'font-name' => 'Sigmar One',
			'css-name' => 'Sigmar+One'
		), 
		'609' => array (
			'font-family' => 'font-family: "Signika";',
			'font-name' => 'Signika',
			'css-name' => 'Signika'
		), 
		'610' => array (
			'font-family' => 'font-family: "Signika Negative";',
			'font-name' => 'Signika Negative',
			'css-name' => 'Signika+Negative'
		), 
		'611' => array (
			'font-family' => 'font-family: "Simonetta";',
			'font-name' => 'Simonetta',
			'css-name' => 'Simonetta'
		), 
		'612' => array (
			'font-family' => 'font-family: "Sintony";',
			'font-name' => 'Sintony',
			'css-name' => 'Sintony'
		), 
		'613' => array (
			'font-family' => 'font-family: "Sirin Stencil";',
			'font-name' => 'Sirin Stencil',
			'css-name' => 'Sirin+Stencil'
		), 
		'614' => array (
			'font-family' => 'font-family: "Six Caps";',
			'font-name' => 'Six Caps',
			'css-name' => 'Six+Caps'
		), 
		'615' => array (
			'font-family' => 'font-family: "Skranji";',
			'font-name' => 'Skranji',
			'css-name' => 'Skranji'
		), 
		'616' => array (
			'font-family' => 'font-family: "Slabo 13px";',
			'font-name' => 'Slabo 13px',
			'css-name' => 'Slabo+13px'
		), 
		'617' => array (
			'font-family' => 'font-family: "Slabo 27px";',
			'font-name' => 'Slabo 27px',
			'css-name' => 'Slabo+27px'
		), 
		'618' => array (
			'font-family' => 'font-family: "Slackey";',
			'font-name' => 'Slackey',
			'css-name' => 'Slackey'
		), 
		'619' => array (
			'font-family' => 'font-family: "Smokum";',
			'font-name' => 'Smokum',
			'css-name' => 'Smokum'
		), 
		'620' => array (
			'font-family' => 'font-family: "Smythe";',
			'font-name' => 'Smythe',
			'css-name' => 'Smythe'
		), 
		'621' => array (
			'font-family' => 'font-family: "Sniglet";',
			'font-name' => 'Sniglet',
			'css-name' => 'Sniglet'
		), 
		'622' => array (
			'font-family' => 'font-family: "Snippet";',
			'font-name' => 'Snippet',
			'css-name' => 'Snippet'
		), 
		'623' => array (
			'font-family' => 'font-family: "Snowburst One";',
			'font-name' => 'Snowburst One',
			'css-name' => 'Snowburst+One'
		), 
		'624' => array (
			'font-family' => 'font-family: "Sofadi One";',
			'font-name' => 'Sofadi One',
			'css-name' => 'Sofadi+One'
		), 
		'625' => array (
			'font-family' => 'font-family: "Sofia";',
			'font-name' => 'Sofia',
			'css-name' => 'Sofia'
		), 
		'626' => array (
			'font-family' => 'font-family: "Sonsie One";',
			'font-name' => 'Sonsie One',
			'css-name' => 'Sonsie+One'
		), 
		'627' => array (
			'font-family' => 'font-family: "Sorts Mill Goudy";',
			'font-name' => 'Sorts Mill Goudy',
			'css-name' => 'Sorts+Mill+Goudy'
		), 
		'628' => array (
			'font-family' => 'font-family: "Source Code Pro";',
			'font-name' => 'Source Code Pro',
			'css-name' => 'Source+Code+Pro'
		), 
		'629' => array (
			'font-family' => 'font-family: "Source Sans Pro";',
			'font-name' => 'Source Sans Pro',
			'css-name' => 'Source+Sans+Pro'
		), 
		'630' => array (
			'font-family' => 'font-family: "Source Serif Pro";',
			'font-name' => 'Source Serif Pro',
			'css-name' => 'Source+Serif+Pro'
		), 
		'631' => array (
			'font-family' => 'font-family: "Special Elite";',
			'font-name' => 'Special Elite',
			'css-name' => 'Special+Elite'
		), 
		'632' => array (
			'font-family' => 'font-family: "Spicy Rice";',
			'font-name' => 'Spicy Rice',
			'css-name' => 'Spicy+Rice'
		), 
		'633' => array (
			'font-family' => 'font-family: "Spinnaker";',
			'font-name' => 'Spinnaker',
			'css-name' => 'Spinnaker'
		), 
		'634' => array (
			'font-family' => 'font-family: "Spirax";',
			'font-name' => 'Spirax',
			'css-name' => 'Spirax'
		), 
		'635' => array (
			'font-family' => 'font-family: "Squada One";',
			'font-name' => 'Squada One',
			'css-name' => 'Squada+One'
		), 
		'636' => array (
			'font-family' => 'font-family: "Sree Krushnadevaraya";',
			'font-name' => 'Sree Krushnadevaraya',
			'css-name' => 'Sree+Krushnadevaraya'
		), 
		'637' => array (
			'font-family' => 'font-family: "Stalemate";',
			'font-name' => 'Stalemate',
			'css-name' => 'Stalemate'
		), 
		'638' => array (
			'font-family' => 'font-family: "Stalinist One";',
			'font-name' => 'Stalinist One',
			'css-name' => 'Stalinist+One'
		), 
		'639' => array (
			'font-family' => 'font-family: "Stardos Stencil";',
			'font-name' => 'Stardos Stencil',
			'css-name' => 'Stardos+Stencil'
		), 
		'640' => array (
			'font-family' => 'font-family: "Stint Ultra Condensed";',
			'font-name' => 'Stint Ultra Condensed',
			'css-name' => 'Stint+Ultra+Condensed'
		), 
		'641' => array (
			'font-family' => 'font-family: "Stint Ultra Expanded";',
			'font-name' => 'Stint Ultra Expanded',
			'css-name' => 'Stint+Ultra+Expanded'
		), 
		'642' => array (
			'font-family' => 'font-family: "Stoke";',
			'font-name' => 'Stoke',
			'css-name' => 'Stoke'
		), 
		'643' => array (
			'font-family' => 'font-family: "Strait";',
			'font-name' => 'Strait',
			'css-name' => 'Strait'
		), 
		'644' => array (
			'font-family' => 'font-family: "Sue Ellen Francisco";',
			'font-name' => 'Sue Ellen Francisco',
			'css-name' => 'Sue+Ellen+Francisco'
		), 
		'645' => array (
			'font-family' => 'font-family: "Sunshiney";',
			'font-name' => 'Sunshiney',
			'css-name' => 'Sunshiney'
		), 
		'646' => array (
			'font-family' => 'font-family: "Supermercado One";',
			'font-name' => 'Supermercado One',
			'css-name' => 'Supermercado+One'
		), 
		'647' => array (
			'font-family' => 'font-family: "Suranna";',
			'font-name' => 'Suranna',
			'css-name' => 'Suranna'
		), 
		'648' => array (
			'font-family' => 'font-family: "Suravaram";',
			'font-name' => 'Suravaram',
			'css-name' => 'Suravaram'
		), 
		'649' => array (
			'font-family' => 'font-family: "Suwannaphum";',
			'font-name' => 'Suwannaphum',
			'css-name' => 'Suwannaphum'
		), 
		'650' => array (
			'font-family' => 'font-family: "Swanky and Moo Moo";',
			'font-name' => 'Swanky and Moo Moo',
			'css-name' => 'Swanky+and+Moo+Moo'
		), 
		'651' => array (
			'font-family' => 'font-family: "Syncopate";',
			'font-name' => 'Syncopate',
			'css-name' => 'Syncopate'
		), 
		'652' => array (
			'font-family' => 'font-family: "Tangerine";',
			'font-name' => 'Tangerine',
			'css-name' => 'Tangerine'
		), 
		'653' => array (
			'font-family' => 'font-family: "Taprom";',
			'font-name' => 'Taprom',
			'css-name' => 'Taprom'
		), 
		'654' => array (
			'font-family' => 'font-family: "Tauri";',
			'font-name' => 'Tauri',
			'css-name' => 'Tauri'
		), 
		'655' => array (
			'font-family' => 'font-family: "Teko";',
			'font-name' => 'Teko',
			'css-name' => 'Teko'
		), 
		'656' => array (
			'font-family' => 'font-family: "Telex";',
			'font-name' => 'Telex',
			'css-name' => 'Telex'
		), 
		'657' => array (
			'font-family' => 'font-family: "Tenali Ramakrishna";',
			'font-name' => 'Tenali Ramakrishna',
			'css-name' => 'Tenali+Ramakrishna'
		), 
		'658' => array (
			'font-family' => 'font-family: "Tenor Sans";',
			'font-name' => 'Tenor Sans',
			'css-name' => 'Tenor+Sans'
		), 
		'659' => array (
			'font-family' => 'font-family: "Text Me One";',
			'font-name' => 'Text Me One',
			'css-name' => 'Text+Me+One'
		), 
		'660' => array (
			'font-family' => 'font-family: "The Girl Next Door";',
			'font-name' => 'The Girl Next Door',
			'css-name' => 'The+Girl+Next+Door'
		), 
		'661' => array (
			'font-family' => 'font-family: "Tienne";',
			'font-name' => 'Tienne',
			'css-name' => 'Tienne'
		), 
		'662' => array (
			'font-family' => 'font-family: "Timmana";',
			'font-name' => 'Timmana',
			'css-name' => 'Timmana'
		), 
		'663' => array (
			'font-family' => 'font-family: "Tinos";',
			'font-name' => 'Tinos',
			'css-name' => 'Tinos'
		), 
		'664' => array (
			'font-family' => 'font-family: "Titan One";',
			'font-name' => 'Titan One',
			'css-name' => 'Titan+One'
		), 
		'665' => array (
			'font-family' => 'font-family: "Titillium Web";',
			'font-name' => 'Titillium Web',
			'css-name' => 'Titillium+Web'
		), 
		'666' => array (
			'font-family' => 'font-family: "Trade Winds";',
			'font-name' => 'Trade Winds',
			'css-name' => 'Trade+Winds'
		), 
		'667' => array (
			'font-family' => 'font-family: "Trocchi";',
			'font-name' => 'Trocchi',
			'css-name' => 'Trocchi'
		), 
		'668' => array (
			'font-family' => 'font-family: "Trochut";',
			'font-name' => 'Trochut',
			'css-name' => 'Trochut'
		), 
		'669' => array (
			'font-family' => 'font-family: "Trykker";',
			'font-name' => 'Trykker',
			'css-name' => 'Trykker'
		), 
		'670' => array (
			'font-family' => 'font-family: "Tulpen One";',
			'font-name' => 'Tulpen One',
			'css-name' => 'Tulpen+One'
		), 
		'671' => array (
			'font-family' => 'font-family: "Ubuntu";',
			'font-name' => 'Ubuntu',
			'css-name' => 'Ubuntu'
		), 
		'672' => array (
			'font-family' => 'font-family: "Ubuntu Condensed";',
			'font-name' => 'Ubuntu Condensed',
			'css-name' => 'Ubuntu+Condensed'
		), 
		'673' => array (
			'font-family' => 'font-family: "Ubuntu Mono";',
			'font-name' => 'Ubuntu Mono',
			'css-name' => 'Ubuntu+Mono'
		), 
		'674' => array (
			'font-family' => 'font-family: "Ultra";',
			'font-name' => 'Ultra',
			'css-name' => 'Ultra'
		), 
		'675' => array (
			'font-family' => 'font-family: "Uncial Antiqua";',
			'font-name' => 'Uncial Antiqua',
			'css-name' => 'Uncial+Antiqua'
		), 
		'676' => array (
			'font-family' => 'font-family: "Underdog";',
			'font-name' => 'Underdog',
			'css-name' => 'Underdog'
		), 
		'677' => array (
			'font-family' => 'font-family: "Unica One";',
			'font-name' => 'Unica One',
			'css-name' => 'Unica+One'
		), 
		'678' => array (
			'font-family' => 'font-family: "UnifrakturCook";',
			'font-name' => 'UnifrakturCook',
			'css-name' => 'UnifrakturCook'
		), 
		'679' => array (
			'font-family' => 'font-family: "UnifrakturMaguntia";',
			'font-name' => 'UnifrakturMaguntia',
			'css-name' => 'UnifrakturMaguntia'
		), 
		'680' => array (
			'font-family' => 'font-family: "Unkempt";',
			'font-name' => 'Unkempt',
			'css-name' => 'Unkempt'
		), 
		'681' => array (
			'font-family' => 'font-family: "Unlock";',
			'font-name' => 'Unlock',
			'css-name' => 'Unlock'
		), 
		'682' => array (
			'font-family' => 'font-family: "Unna";',
			'font-name' => 'Unna',
			'css-name' => 'Unna'
		), 
		'683' => array (
			'font-family' => 'font-family: "VT323";',
			'font-name' => 'VT323',
			'css-name' => 'VT323'
		), 
		'684' => array (
			'font-family' => 'font-family: "Vampiro One";',
			'font-name' => 'Vampiro One',
			'css-name' => 'Vampiro+One'
		), 
		'685' => array (
			'font-family' => 'font-family: "Varela";',
			'font-name' => 'Varela',
			'css-name' => 'Varela'
		), 
		'686' => array (
			'font-family' => 'font-family: "Varela Round";',
			'font-name' => 'Varela Round',
			'css-name' => 'Varela+Round'
		), 
		'687' => array (
			'font-family' => 'font-family: "Vast Shadow";',
			'font-name' => 'Vast Shadow',
			'css-name' => 'Vast+Shadow'
		), 
		'688' => array (
			'font-family' => 'font-family: "Vesper Libre";',
			'font-name' => 'Vesper Libre',
			'css-name' => 'Vesper+Libre'
		), 
		'689' => array (
			'font-family' => 'font-family: "Vibur";',
			'font-name' => 'Vibur',
			'css-name' => 'Vibur'
		), 
		'690' => array (
			'font-family' => 'font-family: "Vidaloka";',
			'font-name' => 'Vidaloka',
			'css-name' => 'Vidaloka'
		), 
		'691' => array (
			'font-family' => 'font-family: "Viga";',
			'font-name' => 'Viga',
			'css-name' => 'Viga'
		), 
		'692' => array (
			'font-family' => 'font-family: "Voces";',
			'font-name' => 'Voces',
			'css-name' => 'Voces'
		), 
		'693' => array (
			'font-family' => 'font-family: "Volkhov";',
			'font-name' => 'Volkhov',
			'css-name' => 'Volkhov'
		), 
		'694' => array (
			'font-family' => 'font-family: "Vollkorn";',
			'font-name' => 'Vollkorn',
			'css-name' => 'Vollkorn'
		), 
		'695' => array (
			'font-family' => 'font-family: "Voltaire";',
			'font-name' => 'Voltaire',
			'css-name' => 'Voltaire'
		), 
		'696' => array (
			'font-family' => 'font-family: "Waiting for the Sunrise";',
			'font-name' => 'Waiting for the Sunrise',
			'css-name' => 'Waiting+for+the+Sunrise'
		), 
		'697' => array (
			'font-family' => 'font-family: "Wallpoet";',
			'font-name' => 'Wallpoet',
			'css-name' => 'Wallpoet'
		), 
		'698' => array (
			'font-family' => 'font-family: "Walter Turncoat";',
			'font-name' => 'Walter Turncoat',
			'css-name' => 'Walter+Turncoat'
		), 
		'699' => array (
			'font-family' => 'font-family: "Warnes";',
			'font-name' => 'Warnes',
			'css-name' => 'Warnes'
		), 
		'700' => array (
			'font-family' => 'font-family: "Wellfleet";',
			'font-name' => 'Wellfleet',
			'css-name' => 'Wellfleet'
		), 
		'701' => array (
			'font-family' => 'font-family: "Wendy One";',
			'font-name' => 'Wendy One',
			'css-name' => 'Wendy+One'
		), 
		'702' => array (
			'font-family' => 'font-family: "Wire One";',
			'font-name' => 'Wire One',
			'css-name' => 'Wire+One'
		), 
		'703' => array (
			'font-family' => 'font-family: "Yanone Kaffeesatz";',
			'font-name' => 'Yanone Kaffeesatz',
			'css-name' => 'Yanone+Kaffeesatz'
		), 
		'704' => array (
			'font-family' => 'font-family: "Yellowtail";',
			'font-name' => 'Yellowtail',
			'css-name' => 'Yellowtail'
		), 
		'705' => array (
			'font-family' => 'font-family: "Yeseva One";',
			'font-name' => 'Yeseva One',
			'css-name' => 'Yeseva+One'
		), 
		'706' => array (
			'font-family' => 'font-family: "Yesteryear";',
			'font-name' => 'Yesteryear',
			'css-name' => 'Yesteryear'
		), 
		'707' => array (
			'font-family' => 'font-family: "Zeyada";',
			'font-name' => 'Zeyada',
			'css-name' => 'Zeyada'
		),
	);
	
	return $fonts_list;
	
}
}

?>