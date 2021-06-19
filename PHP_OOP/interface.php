<?php
    interface DongVat{
        function diChuyen();
        function an();
    }

    interface bosat extends DongVat{
        function kiemAn();
    }

    class khungLong implements bosat, DongVat{
        function diChuyen(){}
        function an(){}
        function kiemAn(){}
    }

    class khungLongBaoChua extends khungLong{
        function diChuyen()
        {
            echo "Khung long bao chua di chuyen bang 2 chan";
        }
        function an()
        {
            echo "Khung long bao chua an thit";
        }
        function kiemAn()
        {
            echo "Khung long bao chua san moi";
        }
    }


?>