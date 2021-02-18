<template>
	<div class="header-container">
		<div class="header-logo">
			<div class="header-logo__text">
				<div>Test task</div>
				<div>Developed for</div>
			</div>
			<div class="header-logo__image-container">
				<img src="@/assets/eds_logo.svg" alt="Eclipse Digital Studio">
			</div>
		</div>
		<b-nav>
			<b-nav-item to="/">Home</b-nav-item>
			<b-nav-item to="/about">About</b-nav-item>
			<b-nav-item to="/create-article">Create article</b-nav-item>
		</b-nav>
		<Authorization />
	</div>
</template>

<script>
import Authorization from '@/components/Authorization'

export default {
components: {
	Authorization
}
}
</script>

<style scoped>
	.header-container {
		display: flex;
		justify-content: space-between;
		padding: 30px 0;
	}

	.header-logo {
		display: flex;
	}

	.header-logo__text {
		display: flex;
		flex-direction: column;
		justify-content: center;
		margin-right: 15px;
	}

	.header-logo__text div:first-of-type {
		text-transform: uppercase;
		font-weight: bold;
		font-size: 18px;
		line-height: 20px;
	}

	.header-logo__text div:last-of-type {
		font-style: italic;
		font-size: 18px;
		line-height: 20px;
	}

	.header-logo__image-container {
		width: 120px;
	}

	.header-logo__image-container img {
		width: 100%;
	}

	.nav {
		align-items: center;
		font-size: 18px;
		line-height: 24px;
	}

	.router-link-exact-active {
		text-decoration: underline;
	}
</style>