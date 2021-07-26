<template>
	<div>
        <router-view :key="$route.path" />
	</div>
</template>

<script>
    export default {
        data() {
            return {
            }
        },
        created() {
        },
		methods: {
		},
        components: {
        }
    }
</script>