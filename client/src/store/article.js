import axios from 'axios'

export default {
	namespaced: true,
	
	state: {
		categories: [],
		articles: []
	},
	getters: {
		categories (state) {
			return state.categories
		},

		articles (state) {
			return state.articles
		}
	},
	mutations: {
		SET_CATEGORIES (state, categories) {
			state.categories = categories
		},

		SET_ARTICLES (state, articles) {
			state.articles = articles
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
		}
	},
}