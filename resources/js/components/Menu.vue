<template>
    <div class="category" v-for="category in categories">
        <h2 class="section-title">{{ category.name }}</h2>

        <div class="meal" v-for="meal in category.meals">
            <div class="line1">
                <span class="name">{{ meal.name }}</span>
                <span class="price">{{ meal.price }}</span>
            </div>
            <div class="line2">
                <span class="desc">{{ meal.description }}</span>
                <div class="allergens" v-for="allergen in meal.allergens">
                    <span class="allergen">{{ allergen.name }}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Menu',
        data() {
            return {
                categories: null
            }
        },
        created() {
            axios
            .get('/api/meals')
            .then(response => (
                this.categories = response.data.categories
            ));
        }
    }
</script>