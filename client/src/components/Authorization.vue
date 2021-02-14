<template>
	<div class="authorisation-menu-container">
		<b-nav>
			<template v-if="authenticated">
				<b-nav-item disabled>{{ user.name }}</b-nav-item>
				<b-nav-item to="/logout">Logout</b-nav-item>
			</template>

			<template v-else>
				<b-nav-item to="/signin">Log in</b-nav-item>
				<b-nav-item to="/signup">Sign up</b-nav-item>
			</template>
			
		</b-nav>
	</div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
	computed: {
		...mapGetters({
			authenticated: 'auth/authenticated',
			user: 'auth/user',
		})
	}
}
</script>

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