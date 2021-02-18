<template>
  <div class="list-group-container">

    <Loader v-if="loading"/>

    <b-list-group v-else>
      <b-list-group-item class="d-flex justify-content-between align-items-center" v-for="category in categories" :key="category.id">
         <router-link class="category-link" :to="{ name: 'category', params: { categoryAlias: category.alias}}">{{ category.title }}</router-link>
        <b-badge variant="primary" pill>{{ category.articles_quantity }}</b-badge>
      </b-list-group-item>
    </b-list-group>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'
import Loader from '@/components/Loader'

export default {
  name: 'home',

  components: {
		Loader
	},

	data () {
		return {
			loading: false
		}
	},

  computed: {
		...mapGetters({
			categories: 'article/categories'
		}),
	},

  methods: {
    ...mapActions({
			getCategoriesAction: 'article/getCategories'
		}),
  },

  async mounted () {
    //turn on loader
		this.loading = true;

    this.getCategoriesAction().then(() => {
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
</style>