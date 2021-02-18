import axios from 'axios'

export default {
	namespaced: true,
	
	state: {
		categories: [],
		articles: [],
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
			let response = await axios.post('articles', category_alias)
			commit('SET_ARTICLES', response.data)
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