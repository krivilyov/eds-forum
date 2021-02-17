<template>
  <div class="list-group-container">
    <b-list-group>
      <b-list-group-item class="d-flex justify-content-between align-items-center" v-for="category in categories" :key="category.id">
         <router-link class="category-link" :to="{ name: 'category', params: { categoryAlias: category.alias}}">{{ category.title }}</router-link>
        <b-badge variant="primary" pill>{{ category.articles_quantity }}</b-badge>
      </b-list-group-item>
    </b-list-group>
  </div>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  name: 'home',

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
    this.getCategoriesAction()
  }
}
</script>

<style scoped>
  .list-group-container {
    max-width: 650px;
    margin: 0 auto;
  }
</style>