<template>
	<div class="signin-container">
		<h1>Sign In</h1>
		<b-form>
			<b-form-group>
				<b-form-input
					type="email"
					placeholder="Enter email"
					required
				></b-form-input>
			</b-form-group>
			<b-form-group>
				<b-form-input 
					type="password"
					placeholder="Enter password"
					required
				></b-form-input>
			</b-form-group>
			<b-button type="submit" variant="primary">Submit</b-button>
		</b-form>
	</div>
</template>

<script>
export default {
	name: 'signin',
	components: {
		//
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