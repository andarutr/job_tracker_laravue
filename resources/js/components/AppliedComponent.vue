<template>    
    <div class="content">
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                {{ title }}
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <router-link to="/applied/create" class="btn btn-primary shadow-md mr-2">Tambah Data</router-link>
            </div>
        </div>
        <div class="col-span-12 mt-8">
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5 text-center">
                            <div class="text-3xl font-medium leading-8 mt-6">{{ linkedin }}</div>
                            <div class="text-base text-slate-500 mt-1">LINKEDIN</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5 text-center">
                            <div class="text-3xl font-medium leading-8 mt-6">{{ glints }}</div>
                            <div class="text-base text-slate-500 mt-1">GLINTS</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5 text-center">
                            <div class="text-3xl font-medium leading-8 mt-6">{{ jobstreet }}</div>
                            <div class="text-base text-slate-500 mt-1">JOBSTREET</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5 text-center">
                            <div class="text-3xl font-medium leading-8 mt-6">{{ indeed }}</div>
                            <div class="text-base text-slate-500 mt-1">INDEED</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5 text-center">
                            <div class="text-3xl font-medium leading-8 mt-6">{{ pintarnya }}</div>
                            <div class="text-base text-slate-500 mt-1">PINTARNYA</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-2 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5 text-center">
                            <div class="text-3xl font-medium leading-8 mt-6">{{ ekrut }}</div>
                            <div class="text-base text-slate-500 mt-1">E-KRUT</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="intro-y box mt-5">
            <div class="p-5" id="basic-table">
                <div class="preview">
                    <div class="overflow-x-auto">
                        <input type="text" wire:model.live="search" placeholder="Cari data...">
                        <table class="table table-striped mt-5">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">No</th>
                                    <th class="whitespace-nowrap">Perusahaan</th>
                                    <th class="whitespace-nowrap">Role</th>
                                    <th class="whitespace-nowrap">Platform</th>
                                    <th class="whitespace-nowrap">Status</th>
                                    <th class="whitespace-nowrap">AppliedAt</th>
                                    <th class="whitespace-nowrap" width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(ap, index) in applications" :key="index">
                                    <td>{{ index+1 }}</td>
                                    <td>{{ ap.company }}</td>
                                    <td>{{ ap.role }}</td>
                                    <td>{{ ap.platform }}</td>
                                    <td>
                                        <span >{{ ap.status }}</span>
                                    </td>
                                    <td>{{ moment(ap.apply_at).format('DD MMMM YYYY') }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm text-white" @click="showApplication(ap.id)"><i class="bi bi-eye-fill"></i></button>&nbsp;
                                        <button class="btn btn-success btn-sm text-white" @click="updateApplication(ap.id)"><i class="bi bi-pencil-fill"></i></button>&nbsp;
                                        <button class="btn btn-danger btn-sm text-white" @click="deleteApplication(ap.id)"><i class="bi bi-trash-fill"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div> 
        </div> 
        <!-- <div class="mt-5 ml-5 mb-5">{{ $applications->links() }}</div><br> -->
    </div>
</template>

<script>
import axios from 'axios';
import moment from 'moment';
import Swal from 'sweetalert2';

export default {
    data(){
        return {
            title: "List Lamaran Kamu",
            linkedin: 0, 
            glints: 0, 
            jobstreet: 0, 
            indeed: 0, 
            pintarnya: 0, 
            ekrut: 0,
            applications: []
        };
    },
    created(){
        this.countDataCard()
        this.fetchApplications()
    },
    methods: {
        countDataCard(){
            axios.get("/api/getDataCountApplied")
                .then(res => {
                    this.linkedin = res.data.linkedin;
                    this.glints = res.data.glints;
                    this.jobstreet = res.data.jobstreet;
                    this.indeed = res.data.indeed;
                    this.pintarnya = res.data.pintarnya;
                    this.ekrut = res.data.ekrut;
                }).catch(err => {
                    console.log("ada error nih!", err);
                });
                    
        },
        fetchApplications() {
            axios.get("/api/getDataApplied")
                .then(res => {
                    this.applications = res.data.apply;
                }).catch(err => {
                    console.log("ada error nih!", err);
                });
        },
        showApplication(id) {
            localStorage.setItem('applicationId', id);
            this.$router.push('/applied/detail'); 
        },
        updateApplication(id) {
            localStorage.setItem('applicationId', id);
            this.$router.push('/applied/edit'); 
        },
        deleteApplication(id) {
            Swal.fire({
                title: 'Konfirmasi',
                text: "Yakin ingin menghapus data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`/api/remove`, { 
                        data: {id: id }
                    })
                        .then(res => {
                            Swal.fire({
                                title: 'Deleted!',
                                icon: 'success',
                                text: res.message
                            });

                            this.fetchApplications(); 
                        }).catch(err => {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Wah parah nih ada masalah!',
                                icon: 'error'
                            });
                        });
                }
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