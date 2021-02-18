<template>
	<div class="create-article-container">
		<h1>CreateArticle</h1>

		<b-form @submit.prevent="submit" novalidate>
			<b-form-group>
				<b-form-select v-model="form.category_id" class="mb-3">
					<b-form-select-option v-for="category in categories" :value="category.id" :key="category.id">{{ category.title }}</b-form-select-option>
				</b-form-select>
			</b-form-group>

			<b-form-group>
				<b-form-input
					placeholder="Enter the title of the article"
					v-model="form.title"
				></b-form-input>
				<span class="text-error" v-if="errors && errors.title">{{ errors.title[0] }}</span>
			</b-form-group>

			<b-form-group>
				<b-form-textarea
					placeholder="Enter text here..."
					rows="8"
					v-model="form.content"
				></b-form-textarea>
				<span class="text-error" v-if="errors && errors.content">{{ errors.content[0] }}</span>
			</b-form-group>
			<b-button type="submit" variant="primary">Create</b-button>
		</b-form>
	</div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
	name: 'create-article',

	data () {
		return {
			form: {
				category_id: 1,
				title: '',
				content: '',
			},
		}
	},

	computed: {
		...mapGetters({
			categories: 'article/categories',
			errors: 'article/errors',
			articleInfo: 'article/articleInfo',
		}),
	},

	methods: {
    ...mapActions({
			getCategoriesAction: 'article/getCategories',
			createArticleAction: 'article/createArticle',
			removeErrorsAction: 'article/removeErrors',
		}),

		submit () {
			this.createArticleAction(this.form).then(() => {
				this.removeErrorsAction();
				//clear form
				this.category_id = 1;
				this.title = '';
				this.content = '';
				
				//redirect on new article
				this.$router.replace({
					name: 'article-info',
					params: {
						articleAlias: this.articleInfo.alias
					}
				})
			}).catch(() => {
				// return
			})
		}
	},

	async mounted () {
		this.getCategoriesAction()
	}
}
</script>

<style scoped>
	.create-article-container {
		max-width: 600px;
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