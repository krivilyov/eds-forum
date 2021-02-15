import axios from 'axios'

export default {
	namespaced: true,

	state: {
		token: null,
		user: null,
		errors: null,
	},

	getters: {
		authenticated (state) {
			return state.token && state.user
		},

		user (state) {
			return state.user
		},

		errors (state) {
			return state.errors
		}
	},

	mutations: {
		SET_TOKEN (state, token) {
			state.token = token
		},

		SET_USER (state, data) {
			state.user = data
		},

		SET_ERRORS (state, errors) {
			state.errors = errors
		}
	},

	actions: {
		async login ({ dispatch, commit }, credentials) {

			let response = await axios.post('auth/login', credentials).then().catch((error) => {
				commit('SET_ERRORS', error.response.data.errors)
			})

			return dispatch('attempt', response.data.token);
		},

		async attempt ({ commit, state }, token) {

			if(token) {
				commit('SET_TOKEN', token)
			}

			if(!state.token) {
				return
			}

			try {
				let response = await axios.get('auth/user')
				
				commit('SET_USER', response.data)
			} catch (e) {
				commit('SET_TOKEN', null)
				commit('SET_USER', null)
			}
		},

		signOut ({ commit }) {
			return axios.post('auth/logout').then(() => {
				commit('SET_TOKEN', null)
				commit('SET_USER', null)
			})
		}
	},
}