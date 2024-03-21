import baocao from './oop/BaoCaoMuon.js';
import baocaoViPham from './oop/BaoCaoViPham.js'
import BaoCaoChuaMuonSach from './oop/BaoCaoSach.js';
import BaoCaoTheThuVien from './oop/BaoCaoTheThuVien.js'
$(document).ready(function(){
    $('.tab-item').on('click', function(){
      var tab_id = $(this).attr('data-tab');
  
      $('.tab-item').removeClass('active');
      $('.tab-pane').removeClass('active');
  
      $(this).addClass('active');
      $("#" + tab_id).addClass('active');
    });

    baocao.showMuonTra();
    baocao.muonQuaHan();
    baocaoViPham.showViPham();
    BaoCaoChuaMuonSach.showSachChuaMuon();
    BaoCaoTheThuVien.showTheThuVien();
  });



  