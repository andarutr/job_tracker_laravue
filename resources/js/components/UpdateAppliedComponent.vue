<template>
<div class="content">
        <div class="intro-y col-span-12 lg:col-span-6 mt-1">
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-3 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Update Form Lamaran
                    </h2>
                </div>
                <div id="vertical-form" class="p-5">
                    <div class="preview">
                        <form @submit.prevent="update">
                        <div class="">
                            <label for="company" class="form-label">Nama Perusahaan</label>
                            <input id="company" type="text" class="form-control" v-model="company">
                        </div>
                        <div class="mt-3">
                            <label for="role" class="form-label">Role Pekerjaan</label>
                            <input id="role" type="text" class="form-control" v-model="role">
                        </div>
                        <div class="mt-3">
                            <label for="platform" class="form-label">Platform</label>
                            <select class="form-control" v-model="platform">
                                <option value="">Pilih</option>
                                <option>Linkedin</option>
                                <option>Glints</option>
                                <option>Job Street</option>
                                <option>Karir</option>
                                <option>Pintarnya</option>
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="apply_at" class="form-label">Tanggal Lamaran</label>
                            <input id="apply_at" type="date" class="form-control" v-model="apply_at">
                        </div>
                        <div class="mt-3">
                            <label for="status" class="form-label">Status Lamaran</label>
                            <select class="form-control" v-model="status">
                                <option value="">Pilih</option>
                                <option>Send CV</option>
                                <option>Viewed</option>
                                <option>Interview HRD</option>
                                <option>Interview User</option>
                                <option>Success</option>
                                <option>Failed</option>
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="link" class="form-label">Link Eksternal</label>
                            <input id="link" type="text" class="form-control" v-model="link">
                        </div>
                        <div class="mt-3">
                            <label for="description" class="form-label">Deskripsi</label><br>
                            <textarea class="form-control" v-model="description" rows="10"></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning text-white mt-3">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>    
import axios from 'axios';
import moment from 'moment';
import Swal from 'sweetalert2';

export default {
  data() {
    return {
      company: '',
      role: '',
      platform: '',
      apply_at: '',
      status: '',
      link: '',
      description: '',
    };
  },
  created() {
    const id = localStorage.getItem('applicationId');
    if (id) {
        this.fetchData(id);
    }
  },  
  methods: {
    fetchData(id) {
      axios.get('/api/getDataFirst', {
        params: {
            id: id
        }
      })
        .then(res => {
          const data = res.data;
          
          const stripHtmlTags = (html) => {
            const doc = new DOMParser().parseFromString(html, 'text/html');
            return doc.body.textContent || "";
            };
            
          this.company = data.company || '';
          this.role = data.role || '';
          this.platform = data.platform || '';
          this.apply_at = moment(data.apply_at).format('YYYY-MM-DD') || '';
          this.status = data.status || '';
          this.link = data.link || '';
          this.description = stripHtmlTags(data.description) || '';
        })
        .catch(error => {
          console.error('Error fetching data:', error);
        });
    },
    update() {
      axios.put('/api/update', {
        id: localStorage.getItem('applicationId'),
        company: this.company,
        role: this.role,
        platform: this.platform,
        apply_at: this.apply_at,
        status: this.status,
        link: this.link,
        description: this.description
      })
      .then(res => {
        Swal.fire({
            title: "Berhasil",
            icon: "success", 
            text: res.data.message
        });
      })
      .catch(error => {
        if (error.response && error.response.status === 422) {
            let errors = error.response.data.errors;
            let errorMessage = '<ul>';
            Object.keys(errors).forEach(field => {
                errorMessage += `<li>${errors[field][0]}</li>`;
            });
            errorMessage += '</ul>';
            
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                html: errorMessage,
                confirmButtonText: 'OK'
            });
        } else {
            console.error('Ada masalah saat menyimpan data:', error);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Terjadi kesalahan saat menyimpan data!',
                confirmButtonText: 'OK'
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
};
</script>