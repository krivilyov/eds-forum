<template>
	<div class="list-group-container">

		<Loader v-if="loading"/>

		<template v-else-if="articleInfo">
			<Breadcrumbs v-bind:breadcrumbItems = "breadcrumbItems" />
			<b-list-group>
				<b-list-group-item>
					<div class="article-info">
						<div class="article-info__achievement">
							<b-badge class="author" variant="light" pill v-if="articleInfo.user.name">Автор: {{ articleInfo.user.name }}</b-badge>
							<div class="likes">
								<b-badge class="like-quantity" variant="primary" pill>3</b-badge>
								<b-icon-hand-thumbs-up class="like-icon"></b-icon-hand-thumbs-up>
							</div>
						</div>
					</div>
					<div class="article-content">
						<h1>{{ articleInfo.title }}</h1>
						<div class="article-content__text">
							{{ articleInfo.content }}
						</div>
					</div>
				</b-list-group-item>
			</b-list-group>
		</template>

		<template v-else>
			<PageNotFound />
		</template>
	</div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
import PageNotFound from './PageNotFound'
import Loader from '@/components/Loader'
import Breadcrumbs from '@/components/Breadcrumbs'

export default {
	name: 'article-info',
	
	components: {
		PageNotFound,
		Loader,
		Breadcrumbs
	},
	
	data () {
		return {
			loading: false,
			breadcrumbItems: [
				{
					id: 0,
					text: 'Home',
					href: '/'	
				},
			]
		}
	},

	computed: {
		...mapGetters({
			articleInfo: 'article/articleInfo'
		}),
	},

	methods: {
    ...mapActions({
			getArticleInfoAction: 'article/getArticleInfo'
		}),
    },

	async mounted () {
		const alias = {
			'article_alias' : this.$route.params.articleAlias
		}

		//turn on loader
		this.loading = true;

		this.getArticleInfoAction(alias).then(() => {

			//update breadcrumbs
			this.breadcrumbItems.push(
				{
					text:  this.articleInfo.category.title,
					href: '/category/' +  this.articleInfo.category.alias
				},
				{
					text:  this.articleInfo.title,
					href: '/article-info/' +  this.articleInfo.alias
				},
			);

			//turn off loader
			this.loading = false;
		})
	}
}
</script>

<style scoped>
	.list-group-container {
		max-width: 650px;
		margin: 0 auto;
	}

	.article-info__achievement {
		display: flex;
		align-items: center;
		justify-content: space-between;
	}

	.likes {
		display: flex;
		align-items: center;
	}

	.like-quantity {
		margin-right: 7px;
	}

	.article-info {
		padding: 20px 0 40px;
	}

	h1 {
		text-align: center;
		margin-bottom: 20px;
	}

	.article-content__text {
		margin-bottom: 20px;
	}
</style>