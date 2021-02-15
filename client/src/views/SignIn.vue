<template>
	<div class="signin-container">
		<h1>Sign In</h1>
		<b-form @submit.prevent="submit" novalidate>
			<b-form-group>
				<b-form-input
					type="email"
					placeholder="Enter email"
					v-model="form.email"
				></b-form-input>
				<span class="text-error" v-if="errors && errors.email">{{ errors.email[0] }}</span>
			</b-form-group>
			<b-form-group>
				<b-form-input 
					type="password"
					placeholder="Enter password"
					v-model="form.password"
				></b-form-input>
				<span class="text-error" v-if="errors && errors.password">{{ errors.password[0] }}</span>
			</b-form-group>
			<b-button type="submit" variant="primary">Submit</b-button>
		</b-form>
	</div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
// import store from '@/store'

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
			},
		}
	},

	computed: {
		...mapGetters({
			errors: 'auth/errors'
		}),
	},

	methods: {
		...mapActions({
			login: 'auth/login',
			removeErrorsAction: 'auth/removeErrors'
		}),

		submit () {
			this.login(this.form).then(() => {
				this.removeErrorsAction();
				this.$router.replace({
					name: 'home'
				})
			}).catch(() => {
				// return
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

	.text-error {
		color: #fe4343;
		font-size: 14px;
		line-height: 18px;
	}
</style>