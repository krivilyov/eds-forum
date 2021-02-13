<template>
	<div class="authorisation-menu-container">
		<b-nav>
			<b-nav-item to="/signin">Log in</b-nav-item>
			<b-nav-item to="/signup">Sign up</b-nav-item>
			<!--
			<b-nav-item disabled>Vnya Krivilyov</b-nav-item>
			<b-nav-item to="/logout">Logout</b-nav-item>
			-->
		</b-nav>
	</div>
</template>

<style scoped>
	.authorisation-menu-container {
		display: flex;
		align-items: center;
	}

	.nav {
		align-items: center;
		font-size: 18px;
		line-height: 24px;
	}
</style>