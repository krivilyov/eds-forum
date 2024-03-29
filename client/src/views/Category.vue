<template>
	<div class="list-group-container">
		<Loader v-if="loading"/>

		<template v-else-if="articles.length > 0">
			<Breadcrumbs v-bind:breadcrumbItems = "breadcrumbItems" />

			<b-list-group>
				<b-list-group-item class="d-flex justify-content-between align-items-center" v-for="article in articles" :key="article.id">
					<div class="article-info">
						<router-link class="article-link" :to="{ name: 'article-info', params: { articleAlias: article.alias}}">{{ article.title }}</router-link>
						<div class="article-shift-content">{{ article.content.substring(0, 300) }}</div>
					</div>
					<div class="achievement">
						<b-badge class="author" variant="light" pill>{{ article.user.name }}</b-badge>
						<div class="likes">
							<b-badge class="like-quantity" variant="primary" pill>3</b-badge>
							<b-icon-hand-thumbs-up class="like-icon"></b-icon-hand-thumbs-up>
						</div>
					</div>
				</b-list-group-item>
			</b-list-group>
		</template>

		<template v-else>
			<div class="no-articles">
				В данной категории нет статей
			</div>
		</template>
	</div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
import Loader from '@/components/Loader'
import Breadcrumbs from '@/components/Breadcrumbs'

export default {
	name: 'category',

	components: {
		Loader,
		Breadcrumbs
	},

	data () {
		return {
			loading: false,
			breadcrumbItems: [
				{
					text: 'Home',
					href: '/'	
				},
			]
		}
	},

	computed: {
		...mapGetters({
			articles: 'article/articles',
			category: 'article/category'
		}),
	},

	methods: {
    ...mapActions({
			getArticlesAction: 'article/getArticles'
		}),
    },

	async mounted () {
		const alias = {
			'category_alias' : this.$route.params.categoryAlias
		}

		//turn on loader
		this.loading = true;

		this.getArticlesAction(alias).then(() => {
			//update breadcrumbs
			this.breadcrumbItems.push({
				text:  this.category.title,
				href: '/category/' +  this.category.alias
			});

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

  .author {
	display: block;
	margin-bottom: 10px;
  }

  .like-icon {
	cursor: pointer;
  }

  .article-info {
	max-width: 70%;
  }

  .article-shift-content {
	font-size: 14px;
	line-height: 18px;
  }

  .article-link {
	font-size: 20px;
	line-height: 28px;
  }

  .achievement {
	display: flex;
	align-items: center;
	flex-direction: column;
  }

  .likes {
	display: flex;
  }

  .like-quantity {
	padding: 3px 10px;
	margin-right: 7px;
  }

  .no-articles {
    text-align: center;
	font-size: 28px;
    margin-top: 40px;
  }
</style>