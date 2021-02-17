import axios from 'axios'

export default {
	namespaced: true,
	
	state: {
		categories: [],
		articles: [],
		articleInfo: null,
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
		}
	},
}