<?php

include 'connect.php';

// Tambah data,hapus dan edit tanpa validasi dan sanitasi
if (isset($_GET['proses']) and $_GET['proses'] == 'remove') {{
    $id = $_GET['id']; // Mengambil nilai ID dari parameter GET
    if (hapus($id)) { // Memanggil fungsi hapus() dengan memberikan nilai ID sebagai argumen

        echo '<script> 
            alert("Berhasil Terhapus"); 
            window.location.href = "dashboard.php";
        </script>';
    } else {
        echo '<script> 
            alert("Gagal Terhapus"); 
            window.location.href = "dashboard.php";
        </script>';
    }
}
} else if (isset($_POST['proses']) and $_POST['proses'] == 'submit') {
    tambah();
} else if (isset($_POST['proses']) and $_POST['proses'] == 'update') {
    $id = $_POST['id']; // Anda perlu mendapatkan nilai ID dari data yang sedang diubah
    $seller = $_POST['Seller'];
    $phone = $_POST['Phone'];
    $product = $_POST['Product'];
    $count = $_POST['Count'];
    $sp = $_FILES['sp']['name']; // Anda perlu mendapatkan nama file yang baru diupload, jika ada

edit($id, $seller, $phone, $product, $count, $sp);
    edit($id, $seller, $phone, $product, $count, $sp);

}

function hapus($id)
{
    
    global $con;  
    $query = "DELETE from anyeong where id=?";
    $stmt = $con->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->affected_rows > 0 ? true : false;
    $stmt->close();
    return $result;
}

function tambah()
{
    global $con;
    $seller = $_POST['Seller'];
    $phone = $_POST['Phone'];
    $product = $_POST['Product'];
    $count = $_POST['Count'];
    $sp_tmp = $_FILES['sp'];

    if (!preg_match('/^\d{10,12}$/', $phone)) {
        echo '<script>alert("Nomor telepon harus terdiri dari 10 hingga 12 digit.");window.location.href = "newdata.php";</script>';
        return;
    }

    // Menentukan nama file img yang baru
    $sp = uniqid() . '.' . pathinfo($sp_tmp['name'], PATHINFO_EXTENSION);

    // Memindahkan $sp_tmp img yang diunggah ke direktori yang ditentukan
    if ($sp_tmp['error'] == 4) {
        $sp = "null";
    } else {
        if (!move_uploaded_file($sp_tmp['tmp_name'], 'uploads/' . $sp)) {
            echo "<script>
            alert('Foto tidak bisa di masukkan.');
        </script>";
            return 0;
        }
    }

    $query = "INSERT INTO anyeong (Seller, Phone, Product, Count, Photo) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "sssss", $seller, $phone, $product, $count, $sp);
    $eksekusi=mysqli_stmt_execute($stmt);

    if ($eksekusi) {
        echo
        '<script> 
            alert("Proses Input Berhasil"); 
            window.location.href = "dashboard.php";
        </script>';
    } else {
        echo
        '<script> 
            alert("Proses Input Gagal"); 
        </script>';
    }

}

function edit($seller, $phone, $product, $count, $sp, $id)
{
    global $con;
    $stmt = $con->prepare("UPDATE anyeong set Seller=?, Phone=?, Product=?, Count=?, Photo=? WHERE id=?");
    $stmt->bind_param("ssssi", $seller, $phone, $product, $count, $sp);
    $stmt->execute();
    $result = $stmt->affected_rows > 0 ? true : false;
    $stmt->close();
    return $result;
    
}