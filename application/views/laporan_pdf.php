<html lang="en">
<head>
    <style>
        h1 {text-align: center;}
        p {text-align: center;}
        div {text-align: center;}
        
    </style>
</head>
    <body>
        <H1>Rekap Bimbingan</H1>
        
         <table>
         <tr>
                <td><b>Nama Guru BK</td>
                <td><b>:</td>
                <td><b><?php echo $guru->nama_guru ?></td>
            </tr>
            <tr>
                <td><b>Nama Siswa </td>
                <td><b>:</td>
                <td><b><?php echo $bimbingan->nama_siswa ?></td>
            </tr>
            <tr>
                <td><b>NIS </td>
                <td><b>:</td>
                <td><b><?php echo $bimbingan->nis ?></td>
            </tr>
            <tr>
                <td><b>Jurusan </td>
                <td><b>:</td>
                <td><b><?php echo $bimbingan->nama_jurusan .' '.$bimbingan->urutan_kelas ?></td>
            </tr>
            <tr>
                <td><b>Tingkat </td>
                <td><b>:</td>
                <td><b><?php if($bimbingan->id_tingkatan=='1'){echo "X (Sepuluh)";}elseif($bimbingan->id_tingkatan=='2'){echo "XI (Sebelas)";}elseif($bimbingan->id_tingkatan=='3'){echo "XII(Duabelas)";} ?></td>
            </tr>
            <tr>
                <td><b>Subjek </td>
                <td><b>:</td>
                <td><b><?php echo $bimbingan->subject ?></td>
            </tr>
        </table> 


        <?php foreach($data_bimbingan as $data): ?>
            <br>
            <b><?php if($data['idFrom']==$guru->nik){echo 'Guru';}else{echo 'Siswa';} ?></b> <?php echo date('d/m/y h:i a', $data['timestamp']); ?>
            <br>
            <i><?php echo $data['content'] ?> </i>
            <br>
        <?php endforeach; ?>

        
    </body>
</html>