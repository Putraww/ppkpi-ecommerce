<?php
$querySetting = mysqli_query($koneksi, "SELECT * FROM setting ORDER BY id DESC");
if (isset($_POST['simpan'])) {
    $email = $_POST['email'];
    $no_tlp_website = $_POST['no_tlp_website'];
    $alamat_website = $_POST['alamat_website'];
    $facebook_link = $_POST['fb'];
    $twitter_link = $_POST['twitter'];
    $instagram_link = $_POST['ig'];
    $linkedin_link = $_POST['linkedin'];

    if (mysqli_num_rows($querySetting) > 0) {
        // updated
        $id = mysqli_insert_id($koneksi);
        $update = mysqli_query($koneksi, "UPDATE setting SET 
        email = '$email', 
        no_tlp_website = '$no_tlp_website', 
        alamat_website = '$alamat_website', 
        fb = '$facebook_link', 
        ig = '$instagram_link', 
        twitter = '$twitter_link', 
        linkedin = '$linkedin_link' WHERE id = '10'");
        header("location:?pg=setting&edit=berhasil");
    } else {
        // insert
        $insert = mysqli_query(
            $koneksi,
            "INSERT INTO setting (email, alamat_website, no_tlp_website,fb, ig, twitter, linkedin)
        VALUES ('$email','$no_tlp_website','$alamat_website','$facebook_link','$instagram_link','$twitter_link','$linkedin_link')"
        );
        header("location:?pg=setting&tambah=berhasil");
    }
}
$rowSetting = mysqli_fetch_assoc($querySetting);
?>

<form action="" method="post">
    <div class="mb-3">
        <label for="" class="form-label">Email address</label>
        <input value="<?= $rowSetting['email'] ?>" type="email" class="form-control" name="email"
            placeholder="Email address">
    </div>
    <div class="mb-3">
        <label for="">Telpon Website</label>
        <input value="<?= $rowSetting['no_tlp_website'] ?>" type="text" class="form-control" name="no_tlp_website"
            placeholder="Telpon Website">
    </div>
    <div class="mb-3">
        <label for="">Alamat</label>
        <textarea class="form-control" name="alamat_website"><?= $rowSetting['alamat_website'] ?></textarea>
    </div>
    <div class="mb-3">
        <label for="">Facebook Link</label>
        <input value="<?= $rowSetting['fb'] ?>" type="url" class="form-control" name="fb" placeholder="Facebook Link">
    </div>
    <div class="mb-3">
        <label for="">Instagram Link</label>
        <input value="<?= $rowSetting['ig'] ?>" type="text" class="form-control" name="ig" placeholder="Instagram Link">
    </div>
    <div class="mb-3">
        <label for="">Twitter Link</label>
        <input value="<?= $rowSetting['twitter'] ?>" type="text" class="form-control" name="twitter"
            placeholder="Twitter  Link">
    </div>
    <div class="mb-3">
        <label for="">Linkedin</label>
        <input value="<?= $rowSetting['linkedin'] ?>" type="text" class="form-control" name="linkedin"
            placeholder="Linkedin Link">
    </div>
    <div class="mb-3">
        <label for="">Logo</label>
        <input type="file" name="logo">
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
    </div>
</form>