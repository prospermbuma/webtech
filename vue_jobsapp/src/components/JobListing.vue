<script setup>
import { RouterLink } from 'vue-router';
import { defineProps, ref, computed } from 'vue';

const props = defineProps({
    job: Object,
});

const showFullDescription = ref(false);

const toggleFullDescription = () => {
    showFullDescription.value = !showFullDescription.value;
}

const trancatedDescription = computed(() => {
    let description = props.job.description;
    if (!showFullDescription.value) {
        description = description.substring(0, 90).trim() + "...";
    }
    return description;
});
</script>

<template>
    <div class="bg-white rounded-xl shadow-md relative">
        <div class="p-4">
            <div class="mb-6">
                <div class="text-gray-600 my-2">{{ job.type }}</div>
                <h3 class="text-xl font-bold">{{ job.title }}</h3>
            </div>

            <div class="mb-5">
                {{ trancatedDescription }}
                <small @click="toggleFullDescription"
                    class="bg-green-300 hover:bg-green-400 p-1 rounded cursor-pointer">
                    {{ showFullDescription ? "Show Less" : "Show More" }}
                </small>
            </div>

            <h3 class="text-green-500 mb-2">{{ job.salary }} / Year</h3>

            <div class="border border-gray-100 mb-5"></div>

            <div class="flex flex-col lg:flex-row justify-between mb-4">
                <div class="text-orange-700 mb-3 flex align-middle justify-center md:justify-start">
                    <i class="pi pi-map-marker text-orange-700 mt-1 mr-2"></i>
                   <p class="text-orange-700"> {{ job.location }}</p>
                </div>
                <RouterLink :to="'/jobs/' + job.id"
                    class="h-[36px] bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-center text-sm">
                    Read More
                </RouterLink>
            </div>
        </div>
    </div>
</template>