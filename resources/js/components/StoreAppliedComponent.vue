<template>
    <div class="content">
        <div class="intro-y col-span-12 lg:col-span-6 mt-1">
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-3 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Form Lamaran
                    </h2>
                </div>
                <div id="vertical-form" class="p-5">
                    <div class="preview">
                        <form wire:submit="store">
                        <div class="">
                            <label for="company" class="form-label">Nama Perusahaan</label>
                            <input id="company" type="text" class="form-control" wire:model="company">
                        </div>
                        <div class="mt-3">
                            <label for="role" class="form-label">Role Pekerjaan</label>
                            <input id="role" type="text" class="form-control" wire:model="role">
                        </div>
                        <div class="mt-3">
                            <label for="platform" class="form-label">Platform</label>
                            <select class="form-control" wire:model="platform">
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
                            <input id="apply_at" type="date" class="form-control" wire:model="apply_at">
                        </div>
                        <div class="mt-3">
                            <label for="status" class="form-label">Status Lamaran</label>
                            <select class="form-control" wire:model="status">
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
                            <input id="link" type="text" class="form-control" wire:model="link">
                        </div>
                        <div class="mt-3">
                            <label for="description" class="form-label">Deskripsi</label><br>
                            <textarea class="form-control" wire:model="description" rows="10"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>