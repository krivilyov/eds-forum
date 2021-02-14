<template>
	<div class="signin-container">
		<h1>Sign In</h1>
		<b-form @submit.prevent="submit">
			{{ form }}
			<b-form-group>
				<b-form-input
					type="email"
					placeholder="Enter email"
					required
					v-model="form.email"
				></b-form-input>
			</b-form-group>
			<b-form-group>
				<b-form-input 
					type="password"
					placeholder="Enter password"
					required
					v-model="form.password"
				></b-form-input>
			</b-form-group>
			<b-button type="submit" variant="primary">Submit</b-button>
		</b-form>
	</div>
</template>

<script>
import { mapActions } from 'vuex'

export default {
	name: 'signin',
	components: {
		//
	},

	data () {
		return {
			form: {
				email: '',
				password: '',
			}
		}
	},

	methods: {
		...mapActions({
			login: 'auth/login'
		}),

		submit () {
			this.login(this.form).then(() => {
				this.$router.replace({
					name: 'home'
				})
			}).catch(() => {
				console.log('fail');
			})
		}
	}
}
</script>

<style scoped>
	.signin-container {
		max-width: 400px;
		margin: auto;
	}

	h1 {
		font-family: 'Roboto', sans-serif;
		text-align: center;
		font-size: 54px;
		line-height: 60px;
		margin-bottom: 60px;
	}
</style>