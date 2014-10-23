<!DOCTYPE html>
<html>
<head>
	@include('Globals.head')
</head>
<body class="backgroundcolor1" style="width: 100%;">
<div style="bottom: 0; position: absolute;">
    <div style="float: left;">
            {{ HTML::image('ressources/assets/404_shadowed.png', null, array('style' => 'max-height: 500px; max-width: 600px;')) }}
    </div>
</div>
    <div style="display: block;
                    margin-left: auto;
                    margin-right: auto; text-align: center; ">
            {{ HTML::image('ressources/assets/404_text.png', null, array('style' => 'max-height: 500px; max-width: 600px;')) }}
    </div>

</body>
</html>