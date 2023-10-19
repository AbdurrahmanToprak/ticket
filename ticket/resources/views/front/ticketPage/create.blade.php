

<div class="background-white box-shadow padding-lg margin-top-xlg ">
    <div class="d-flex justify-content-center">
        <div class="font-size-26 color-black font-weight-5 ">Destek Talep Formu</div>

    </div>

    <div class="form margin-top-lg bg-white border-bottom shadow-sm ~bg-body rounded-3 mb-3 p-3 " align="center">
        <div class="form-row">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{route('ticket_store')}}" method="post">
                        @csrf
                        <select class="custom-select font-size-16 width-full" name="department" id="department" onchange="departmanChange()" required="">
                            <option value="">Departman Seçiniz</option>

                            <option value="4">Domain Hizmetleri</option>

                            <option value="7">Hosting Hizmetleri</option>

                            <option value="9">Marka Tescili</option>

                            <option value="10">Muhasebe</option>

                            <option value="12">Satış</option>

                            <option value="13">Sunucu Hizmetleri</option>

                            <option value="15">TR Domain Hizmetleri</option>

                            <option value="16">Üyelik Hizmetleri</option>

                            <option value="28">İade İşlemleri</option>

                        </select>
                </div>
            </div>
        </div>
        <div class="form-row d-flex justify-content-center">
            <div class="row">
                <div class="col-12">
                    <select class="custom-select font-size-16 width-full" name="level" id="level" required="">
                        <option value="">Öncelik Seviyesi</option>

                        <option value="7">Düşük</option>

                        <option value="8">Normal</option>

                        <option value="9">Yüksek</option>

                        <option value="10">Çok Yüksek</option>

                        <option value="11">Acil</option>

                        <option value="12">Kritik</option>

                    </select>
                </div>
            </div>
        </div>



   <!--     <div class="form-row margin-top-md">
            <input class="custom-input" type="text" minlength="5" id="name" name="name" placeholder="Ad Soyad" required="">
        </div>

        <div class="form-row margin-top-md">
            <input class="custom-input" type="email" id="email" name="email" placeholder="Email" required="">
        </div>



        <div class="form-row margin-top-md">
            <input class="custom-input" type="text" id="productname" name="productname" placeholder="Domain Adresiniz" style="display: none;">
        </div>

        <div class="form-row margin-top-md">
            <input class="custom-input ip" type="text" id="serverip" name="serverip" placeholder="Sunucu İp Adresi" pattern="^([0-9]{1,3}\.){3}[0-9]{1,3}$" style="display: none;">
        </div>

        <div class="form-row margin-top-md">
            <input class="custom-input" type="text" id="serverpass" name="serverpass" placeholder="Sunucu Şifre" style="display: none;">
        </div>
-->
        <div class="form-row margin-top-md">
            <input class="custom-input" type="text" minlength="5" maxlength="100" id="subject" name="subject" placeholder="Konu" required="">
        </div>
        <div class="form-row margin-top-md">
            <textarea class="custom-input" id="mesaj" minlength="5" maxlength="1000" name="message" cols="30" rows="5" placeholder="Mesajınız" required=""></textarea>
        </div>
        <div class="btn btn-primary form-row margin-top-md">
            <input class="custom-button" type="submit" value="Gönder">
        </div>
    </div>
</div>

</form>
