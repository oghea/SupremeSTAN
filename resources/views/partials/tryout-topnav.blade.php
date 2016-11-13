<div class="nav_menu col-md-12">
    <div class="col-md-12" style="text-align:center;margin-bottom:10px;">
        <h5>Tryout Supreme</h5>
    </div>
    <div class="col-md-9" style="font-size:15px;">
        <div class="col-md-12">
            Nama Peserta: {{$users->name}}
        </div>
        <div class="col-md-12">
            Sekolah Asal: {{$users->user_profile->school_origin}}
        </div>
        <div class="col-md-12">
            Jenis Tryout: {{$judul->judul}}
        </div>
    </div>
    <div class="col-md-3" style="margin-bottom:10px;">
        <div class="clock"></div>
    </div>
</div>