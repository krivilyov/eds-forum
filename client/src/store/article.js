import axios from 'axios'

export default {
	namespaced: true,
	
	state: {
		categories: [],
		articles: [],
		category: null,
		articleInfo: null,
		errors: null,
	},

	getters: {
		categories (state) {
			return state.categories
		},

		articles (state) {
			return state.articles
		},

		category (state) {
			return state.category
		},

		articleInfo (state) {
			return state.articleInfo
		},

		errors (state) {
			return state.errors
		}
	},

	mutations: {
		SET_CATEGORIES (state, categories) {
			state.categories = categories
		},

		SET_ARTICLES (state, articles) {
			state.articles = articles
		},

		SET_CATEGORY (state, category) {
			state.category = category
		},

		SET_ARTICLE (state, articleInfo) {
			state.articleInfo = articleInfo
		},

		SET_ERRORS (state, errors) {
			state.errors = errors
		}
	},

	actions: {
		async getCategories ({ commit }) {
			let response = await axios.post('categories')
			commit('SET_CATEGORIES', response.data)
		},

		async getArticles ({ commit }, category_alias) {
			let responseCategory = await axios.post('category', category_alias)
			commit('SET_CATEGORY', responseCategory.data)

			let responseArticles = await axios.post('articles', category_alias)
			commit('SET_ARTICLES', responseArticles.data)
		},

		async getArticleInfo ({ commit }, article_alias) {
			let response = await axios.post('article', article_alias)
			commit('SET_ARTICLE', response.data)
		},

		async createArticle ({ commit }, credentials) {
			let response = await axios.post('article/create', credentials).then().catch((error) => {
				commit('SET_ERRORS', error.response.data.errors)
			})

			commit('SET_ARTICLE', response.data)
		},

		removeErrors ({ commit }) {
			commit('SET_ERRORS', null)
		},
	},
}