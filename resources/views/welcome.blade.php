@extends('layouts.app')

@section('title' , 'Accueil')

@section('styles')
<style>
	.masthead.segment {
		min-height: 350px;
	}
	.masthead h1.ui.header {
		margin-top: 1.5em;
		margin-bottom: 0em;
		font-size: 4em;
		font-weight: normal;
	}
	.masthead h2 {
		font-size: 1.7em;
		font-weight: normal;
	}
	.ui.vertical.stripe {
		padding: 8em 0em;
	}
</style>
@endsection

@section('copyrights')
<div>Icones faites par <a href="https://www.freepik.com" title="Freepik">Freepik</a> de <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
@endsection

@section('content')
<div class="ui inverted vertical masthead center aligned segment">
	<div class="ui text container">
		<h1 class="ui inverted header">Foacs</h1>
		<h2 class="ui inverted header"><i>French Organization of Application CreatorS</i></h2>
	</div>
</div>
<div class="ui vertical stripe segment">
	<div class="ui middle aligned stackable vertically divided grid container">
		<div class="two column row">
			<div class="column">
				<div class="ui piled segment">
					<h3 class="ui header">Open source</h3>
					<h4 class="ui header">Développement pour et par la communauté.</h4>
					<p>
						Foacs s'est donné comme objectif de mettre ses compétences au service du plus grand nombre. Elle met son expertise à disposition des autres par le biais de travaux open source.<br />
						Ainsi, quelle que soit la platform ou les technologies employées, les productions de Foacs sont open source.
						
					</p>
				</div>
			</div>
			<div class="center aligned column">
				<a href="http://opensource.org/" target="_blank" class="ui small image">
					<img src="https://opensource.org/files/OSI_Standard_Logo.svg" alt="Open Source Initiative">
				</a>
				<br>
				<i >* Ce site n'est ni affilié ni approuvé par l'Open Source Initiative</i>
			</div>
		</div>
		<div class="two column row">
			<div class="center aligned column">
				<div class="ui small image">
					<img src="{{ asset('/img/idea.svg') }}" alt="Soutenir les idées">
				</div>
			</div>
			<div class="column">
				<div class="ui piled segment">
					<h3 class="ui header">Soutenir</h3>
					<h4 class="ui header">Soutenir les projets de la communauté.</h4>
					<p>
						Foacs se donne pour objectif de soutenir les idées de projet. Chaque initiative est dument étudiée pour apporter le soutien nécessaire.<br>
						Foacs tente d'apporter son expertise et ses conseils pour le développement de projets proposés par la communauté.<br/>
						Rejoignez-nous sur <a href="https://discord.gg/VWX9pybWvT">Discord</a> pour discuter de vos idées.
					</p>
				</div>
			</div>
		</div>
		<div class="two column row">
			<div class="column">
				<div class="ui piled segment">
					<h3 class="ui header">Partager</h3>
					<h4 class="ui header">Partager les connaissances.</h4>
					<p>
						Profiter de nos savoirs tout en partageant les vôtres. Notre volonté est de partager les connaissances et de faire de Foacs un pôle de savoir.
						Ainsi, nous souhaitons offrir la posibilité de donner et de reçevoir  
					</p>
				</div>
			</div>
			<div class="center aligned column">
				<div class="ui small image">
					<img src="{{ asset('/img/sharing.svg') }}" alt="Partager les connaissances">
				</div>
			</div>
		</div>
	</div>
</div>
@endsection