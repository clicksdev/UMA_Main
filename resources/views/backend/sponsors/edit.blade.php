@extends('backend.layouts.layout')

@section("title", "Sponsors - Edit")
@section("loading_txt", "Update")

@section("content")
<div class="p-4">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Partener</h1>
        <a href="{{ route("admin.sponsors.show") }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    <div class="card p-3 mb-3" id="sponsors_wrapper">
        <div class="d-flex justify-content-between" style="gap: 16px">
            <div class="w-100">
                <div class="form-group w-100">
                    <label for="Title" class="form-label">Name</label>
                    <input type="text" class="form-control" id="Name"  placeholder="Sponsor Name" v-model="name">
                </div>
                <div class="form-group w-100">
                    <label for="Title" class="form-label">Name in arabic</label>
                    <input type="text" class="form-control" id="Name"  placeholder="Sponsor Namein arabic" v-model="name_ar">
                </div>
                <div class="form-group w-100">
                    <label for="Url" class="form-label">Url</label>
                    <input type="text" class="form-control" id="Url"  placeholder="Sponsor Url" v-model="link">
                </div>
            </div>
            <div class="form-group pt-4 pb-4" style="width: max-content; height: 300px;min-width: 250px">
                <label for="thumbnail" class="w-100 h-100">
                    <svg v-if="!thumbnail && !thumbnail_path" xmlns="http://www.w3.org/2000/svg" className="icon icon-tabler icon-tabler-photo-up" width="24" height="24" viewBox="0 0 24 24" strokeWidth="1.5" style="width: 100%; height: 100%; object-fit: cover; padding: 10px; border: 1px solid; border-radius: 1rem" stroke="#043343" fill="none" strokeLinecap="round" strokeLinejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M15 8h.01" />
                        <path d="M12.5 21h-6.5a3 3 0 0 1 -3 -3v-12a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v6.5" />
                        <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l3.5 3.5" />
                        <path d="M14 14l1 -1c.679 -.653 1.473 -.829 2.214 -.526" />
                        <path d="M19 22v-6" />
                        <path d="M22 19l-3 -3l-3 3" />
                    </svg>
                    <img v-if="thumbnail_path" :src="thumbnail_path" style="width: 100%; height: 100%; object-fit: cover; padding: 10px; border: 1px solid; border-radius: 1rem" />
                </label>
            <input type="file" class="form-control d-none" id="thumbnail"  placeholder="Sponsor Thumbnail Picture" @change="handleChangeThumbnail">
            </div>
            </div>
        <div class="form-group">
            <button class="btn btn-success w-25" @click="update">Update</button>
        </div>
    </div>
</div>

@endSection

@section("Script")
<script src="{{ asset('/jquery/jquery.js') }}"></script>
<script src="{{ asset('/axios/axios.min.js') }}"></script>
<script src="{{ asset('/vue/vue.min.js') }}"></script>

<script>
const { createApp, ref } = Vue

createApp({
    data() {
        return {
            id: '{{ $sponsor->id }}',
            name: '{{ $sponsor->name }}',
            name_ar: '{{ $sponsor->name_ar }}',
            link: '{{ $sponsor->link }}',
            thumbnail: null,
            thumbnail_path: '{{ $sponsor->image_path }}',
        }
    },
    methods: {
        handleChangeThumbnail(event) {
            this.thumbnail = event.target.files[0]
            this.thumbnail_path = URL.createObjectURL(event.target.files[0])
        },
        handleChangecover(event) {
            this.cover = event.target.files[0]
            this.cover_path = URL.createObjectURL(event.target.files[0])
        },
        async update() {
            $('.loader').fadeIn().css('display', 'flex')
            try {
                const response = await axios.post(`{{ route("admin.sponsors.update") }}`, {
                    id: this.id,
                    name: this.name,
                    name_ar: this.name_ar,
                    link: this.link,
                    image: this.thumbnail,
                },
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                },
                );
                if (response.data.status === true) {
                    document.getElementById('errors').innerHTML = ''
                    let error = document.createElement('div')
                    error.classList = 'success'
                    error.innerHTML = response.data.message
                    document.getElementById('errors').append(error)
                    $('#errors').fadeIn('slow')
                    setTimeout(() => {
                        $('.loader').fadeOut()
                        $('#errors').fadeOut('slow')
                        window.location.href = '{{ route("admin.sponsors.show") }}'
                    }, 1300);
                } else {
                    $('.loader').fadeOut()
                    document.getElementById('errors').innerHTML = ''
                    $.each(response.data.errors, function (key, value) {
                        let error = document.createElement('div')
                        error.classList = 'error'
                        error.innerHTML = value
                        document.getElementById('errors').append(error)
                    });
                    $('#errors').fadeIn('slow')
                    setTimeout(() => {
                        $('#errors').fadeOut('slow')
                    }, 5000);
                }

            } catch (error) {
                document.getElementById('errors').innerHTML = ''
                let err = document.createElement('div')
                err.classList = 'error'
                err.innerHTML = 'server error try again later'
                document.getElementById('errors').append(err)
                $('#errors').fadeIn('slow')
                $('.loader').fadeOut()

                setTimeout(() => {
                    $('#errors').fadeOut('slow')
                }, 3500);

                console.error(error);
            }
        }
    },
}).mount('#sponsors_wrapper')
</script>
@endSection
