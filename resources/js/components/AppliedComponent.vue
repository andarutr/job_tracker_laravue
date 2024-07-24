<template>    
    <div class="content">
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                {{ title }}
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="javascript:;" class="btn btn-primary shadow-md mr-2"><router-link to="/applied/create">Tambah Data</router-link></a>
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
                                    <th class="whitespace-nowrap">Perusahaan</th>
                                    <th class="whitespace-nowrap">Role</th>
                                    <th class="whitespace-nowrap">Platform</th>
                                    <th class="whitespace-nowrap">Status</th>
                                    <th class="whitespace-nowrap">AppliedAt</th>
                                    <th class="whitespace-nowrap" width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- @foreach($applications as $ap)
                                <tr>
                                    <td>{{ $ap->company }}</td>
                                    <td>{{ $ap->role }}</td>
                                    <td>{{ $ap->platform }}</td>
                                    <td>
                                        @if($ap->status === 'Send CV')
                                        <span class="btn btn-sm btn-primary">{{ $ap->status }}</span>
                                        @elseif($ap->status === 'Viewed')
                                        <span class="btn btn-sm btn-dark">{{ $ap->status }}</span>
                                        @elseif($ap->status === 'Interview HRD' OR $ap->status === 'Interview User')
                                        <span class="btn btn-sm btn-warning">{{ $ap->status }}</span>
                                        @elseif($ap->status === 'Failed')
                                        <span class="btn btn-sm btn-danger">{{ $ap->status }}</span>
                                        @else
                                        <span class="btn btn-sm btn-success">{{ $ap->status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($ap->apply_at)->format('d F Y') }}</td>
                                    <td>
                                        <a href="/user/applied/show/{{ $ap->id }}" class="btn btn-sm btn-primary"><i class="bi-eye"></i></a>
                                        <a href="/user/applied/edit/{{ $ap->id }}" class="btn btn-sm btn-success text-white"><i class="bi-pencil-fill"></i></a>
                                        <button wire:click="destroy('{{ $ap->id }}')" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data?')"><i class="bi-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach -->
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
        };
    },
    created(){
        this.countDataCard();
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
                    
        }
    }
}
</script>