<template>
	<div>
		<b-breadcrumb>
			<b-breadcrumb-item v-for="item in breadcrumbItems" :to="item.href" :key="item.href">{{ item.text }}</b-breadcrumb-item>
		</b-breadcrumb>
	</div>
</template>

<script>
export default {
	name: 'breadcrumbs',

	props: {
		breadcrumbItems: {
			type: Array,
			default () {
				return [
					{
						text: 'Home',
						href: '/'	
					},
				]
			}
		}
	},

	data () {
		return {
			//
		}
	}
}
</script>

<style scoped>

</style>