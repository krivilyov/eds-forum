<template>
	<div class="authorisation-menu-container">
		<b-nav>
			<template v-if="authenticated">
				<b-nav-item disabled>{{ user.name }}</b-nav-item>
				<b-nav-item to="/logout" @click.prevent="signOut">Logout</b-nav-item>
			</template>

			<template v-else>
				<b-nav-item to="/signin">Log in</b-nav-item>
				<b-nav-item to="/signup">Sign up</b-nav-item>
			</template>
			
		</b-nav>
	</div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
	computed: {
		...mapGetters({
			authenticated: 'auth/authenticated',
			user: 'auth/user',
		})
	},
	methods: {
		...mapActions({
			signOutAction: 'auth/signOut'
		}),

		signOut () {
			this.signOutAction().then(() => {
				this.$router.replace({
					name: 'home'
				})
			})
		}
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

	.router-link-exact-active {
		text-decoration: underline;
	}
</style>