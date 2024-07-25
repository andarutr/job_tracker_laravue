<template>
    <div class="content p-6">
        <div class="intro-y flex flex-col sm:flex-row items-center mb-8">
            <h2 class="text-2xl font-semibold mr-auto">Application Details</h2>
        </div>
        <div class="bg-white shadow-md rounded-lg p-6">
            <div v-if="application" class="text-gray-800">
                <h3 class="text-xl font-bold mb-2">{{ application.company }}</h3>
                <div class="mb-4">
                    <p><strong class="font-medium">Role:</strong> {{ application.role }}</p>
                    <p><strong class="font-medium">Platform:</strong> {{ application.platform }}</p>
                    <p><strong class="font-medium">Status:</strong> {{ application.status }}</p>
                    <p><strong class="font-medium">Applied At:</strong> {{ moment(application.apply_at).format('DD MMMM YYYY') }}</p>
                </div>
            </div>
            <div v-else class="text-gray-500">
                <p>Loading application details...</p>
            </div>
        </div>
        <div class="bg-white shadow-md rounded-lg p-6 mt-5">
            <div class="card-header mb-4">
                <h3 class="text-xl font-semibold">Description</h3>
            </div>
            <div v-if="application" class="text-gray-800" v-html="application.description"></div>
            <div v-else class="text-gray-500">
                <p>Loading description...</p>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import moment from 'moment';

export default {
    data() {
        return {
            application: null
        };
    },
    created() {
        const id = localStorage.getItem('applicationId');
        if (id) {
            this.fetchApplication(id);
        }
    },
    methods: {
        fetchApplication(id) {
            axios.get("/api/getDataFirst",{
                params: {
                    id: id
                }
            })
                .then(res => {
                    this.application = res.data;
                })
                .catch(err => {
                    console.log("ada error nih!", err);
                });
        }
    },
    computed: {
        moment() {
            return moment;
        }
    }
}
</script>

<style scoped>
.card {
    border-radius: 8px;
}

.card-header {
    border-bottom: 1px solid #e0e0e0;
    padding-bottom: 12px;
    font-size: 1.25rem;
    font-weight: 600;
    color: #444;
}

.card-body {
    padding: 16px;
}

.text-gray-800 {
    color: #333;
}

.text-gray-500 {
    color: #777;
}

.font-medium {
    font-weight: 500;
}

.bg-white {
    padding: 20px; 
}

h3 {
    margin-bottom: 16px;
}

p {
    margin-bottom: 12px; 
}
</style>
