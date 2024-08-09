<style type="text/css">
    table {
            border-collapse: collapse;
            width: 100%;
        }
    table tr td,
    table tr th{
        font-size: 9pt;
        padding: 10px;
    }
</style> 
    <h4>Daftar Hadir Finger Print</h4>
        <table style="width: 100%;" class="table" border="1">
          <thead>
            <tr>
              <th>No.</th>
              <th>ID Users</th>
              <th>Username</th>
              <th>No HP</th>
              <th>Tanggal & Waktu Kehadiran</th>
            </tr>
           </thead>
          <tbody>
            @foreach ($data as $key => $value)
            
              <tr>
                <td>{{ $key+1}}</td>
                <td>{{ $value->user_id}}</td>
                <td>{{ $value->username }}</td>
                <td>{{ $value->no_hp}}</td>
                <td>{{ date('d F Y H:i:s', strtotime($value->datetime)) }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>