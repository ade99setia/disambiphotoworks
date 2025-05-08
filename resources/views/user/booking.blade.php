<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Booking Jadwal</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    .paket-option {
      transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }

    .paket-option:hover {
      transform: scale(1.02);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
      /* Efek bayangan sedikit lebih kuat */
    }

    .paket-option.selected {
      background-color: #86D3AB;
      /* Hijau toska muted yang lebih intens */
      color: #2C3E50;
      /* Abu-abu gelap yang bersahaja */
    }

    .paket-option.selected h2,
    .paket-option.selected p,
    .paket-option.selected h3,
    .paket-option.selected ul li {
      color: #2C3E50;
      /* Abu-abu gelap yang bersahaja */
    }

    .paket-option.selected ul li.text-red-500 {
      color: #E53E3E;
      /* Merah yang lebih jelas */
    }

    /* Animasi dropdown */
    .dropdown-enter-active,
    .dropdown-leave-active {
      transition: opacity 0.2s ease, transform 0.2s ease;
    }

    .dropdown-enter-from {
      opacity: 0;
      transform: translateY(-5px);
    }

    .dropdown-enter-to {
      opacity: 1;
      transform: translateY(0);
    }

    .dropdown-leave-from {
      opacity: 1;
      transform: translateY(0);
    }

    .dropdown-leave-to {
      opacity: 0;
      transform: translateY(-5px);
    }
  </style>
  @vite([])
</head>

<body class="bg-gray-200 p-4 sm:p-8 font-sans">

  <div class="max-w-3xl mx-auto p-6 sm:p-8 bg-white rounded-xl shadow-lg space-y-8">
    <div class="">
      <h2 class="text-2xl font-bold text-center sm:text-left text-gray-800 flex-1"><i class="fas fa-calendar-alt mr-2 text-green-500"></i> Booking Jadwal</h2>

      <div class="bg-white p-6 rounded-lg shadow-sm mb-6 flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="flex flex-col sm:flex-row gap-2">
          <div x-data="{
                        open: false,
                        selectedMonthIndex: new Date().getMonth() + 1,
                        selected: new Date().toLocaleString('id-ID', { month: 'long' }),
                        months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                    
                        updateCalendar(index) {
                            this.selectedMonthIndex = index;
                            this.selected = this.months[index - 1];
                        }
                    }" class="relative inline-block text-left w-full sm:w-52">
            <button @click="open = !open"
              class="px-4 py-2 bg-gray-100 hover:bg-green-200 text-green-500 font-semibold rounded-md shadow-sm flex items-center justify-between w-full transition duration-300">
              <span x-text="selected"></span>
              <svg class="w-5 h-5 ml-2 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                  d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.25 8.27a.75.75 0 01-.02-1.06z"
                  clip-rule="evenodd" />
              </svg>
            </button>

            <div x-show="open" @click.away="open = false"
              x-transition:enter="transition ease-out duration-200 transform opacity-0 scale-95"
              x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
              x-transition:leave="transition ease-in duration-150 transform opacity-100 scale-100"
              x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
              class="absolute mt-2 bg-white border border-gray-300 rounded-md shadow-lg w-full z-20 overflow-hidden max-h-48 overflow-y-auto">
              <ul class="divide-y divide-gray-300">
                <template x-for="(month, index) in months" :key="month">
                  <li @click="updateCalendar(index + 1); open = false"
                    class="px-4 py-2 hover:bg-gray-100 cursor-pointer transition duration-200 text-gray-700"
                    x-text="month"></li>
                </template>
              </ul>
            </div>
          </div>
        </div>


        <!-- Pilih Paket -->
        <div class="relative inline-block text-left w-full sm:w-52">
          <div x-data="{ openPaket: false, selectedPaket: '🎁 Pilih Paket' }"
            x-init="$watch('selectedPaket', value => document.getElementById('paketInput').value = value)"
            class="relative">

            <button @click="openPaket = !openPaket"
              class="px-4 py-2 bg-gray-100 hover:bg-green-200 text-green-500 font-semibold rounded-md shadow-sm flex items-center justify-between w-full transition duration-300">
              <span x-text="selectedPaket"></span>
              <svg class="w-5 h-5 ml-2 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.25 8.27a.75.75 0 01-.02-1.06z" clip-rule="evenodd" />
              </svg>
            </button>

            <div x-show="openPaket" @click.away="openPaket = false"
              class="absolute mt-2 bg-white border border-gray-300 rounded-md shadow-lg w-full z-20 overflow-hidden">
              <ul class="divide-y divide-gray-300">
                <li @click="selectedPaket='Prewedding'; openPaket=false" class="px-4 py-2 hover:bg-gray-100 cursor-pointer text-gray-700">Prewedding</li>
                <li @click="selectedPaket='Wedding'; openPaket=false" class="px-4 py-2 hover:bg-gray-100 cursor-pointer text-gray-700">Wedding</li>
                <li @click="selectedPaket='Graduation'; openPaket=false" class="px-4 py-2 hover:bg-gray-100 cursor-pointer text-gray-700">Graduation</li>
                <li @click="selectedPaket='Lamaran'; openPaket=false" class="px-4 py-2 hover:bg-gray-100 cursor-pointer text-gray-700">Lamaran</li>
              </ul>
            </div>
          </div>
        </div>


        <div x-data="{ open: false, selected: '⏲ Pilih Jam' }" x-init="$watch('selected', value => $refs.jamInput.value = value)" for="jam" class="relative inline-block text-left w-full sm:w-52">
          <button @click="open = !open"
            class="px-4 py-2 bg-gray-100 hover:bg-green-200 text-green-500 font-semibold rounded-md shadow-sm flex items-center justify-between w-full sm:w-52 transition duration-300">
            <span x-text="selected"></span>
            <svg class="w-5 h-5 ml-2 text-green-400" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd"
                d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.25 8.27a.75.75 0 01-.02-1.06z"
                clip-rule="evenodd" />
            </svg>
          </button>

          <div x-show="open" @click.away="open = false"
            class="absolute mt-2 bg-white border border-gray-300 rounded-md shadow-lg w-full sm:w-52 z-20 overflow-hidden">
            <ul class="divide-y divide-gray-300">
              <li @click="selected='08.00 - 10.00'; open=false; $nextTick(() => document.getElementById('jamInput').value = selected)"
                class="px-4 py-2 hover:bg-gray-100 cursor-pointer text-gray-700">
                <i class="far fa-clock mr-2 text-green-400"></i> 08.00 - 10.00
              </li>
              <li @click="selected='12.00 - 14.00'; open=false; $nextTick(() => document.getElementById('jamInput').value = selected)"
                class="px-4 py-2 hover:bg-gray-100 cursor-pointer text-gray-700">
                <i class="far fa-clock mr-2 text-green-400"></i> 12.00 - 14.00
              </li>
              <li @click="selected='15.00 - 17.00'; open=false; $nextTick(() => document.getElementById('jamInput').value = selected)"
                class="px-4 py-2 hover:bg-gray-100 cursor-pointer text-gray-700">
                <i class="far fa-clock mr-2 text-green-400"></i> 15.00 - 17.00
              </li>
            </ul>
          </div>
        </div>

      </div>
    </div>

    <div class="grid grid-cols-5 sm:grid-cols-7 gap-3" id="tanggalGrid">
    </div>

    <!-- Keterangan Warna -->
    <div class="mt-6 flex flex-wrap gap-4 text-sm text-gray-700">
      <div class="flex items-center gap-2">
        <div class="w-4 h-4 rounded bg-green-400"></div>
        <span>Tersedia</span>
      </div>
      <div class="flex items-center gap-2">
        <div class="w-4 h-4 rounded bg-yellow-400"></div>
        <span>Menunggu Konfirmasi</span>
      </div>
      <div class="flex items-center gap-2">
        <div class="w-4 h-4 rounded bg-red-400"></div>
        <span>Sudah Dibooking</span>
      </div>
      <div class="flex items-center gap-2">
        <div class="w-4 h-4 rounded bg-gray-300"></div>
        <span>Tidak Tersedia</span>
      </div>
    </div>



    <form action="{{ route('booking.submit') }}" method="POST" class="space-y-4">
      @csrf

      <input type="hidden" name="user_id" id="userID" value="{{ $user->id }}" />
      <input type="hidden" name="tanggal" id="tanggalInput" />
      <input type="hidden" name="jam" id="jamInput">
      <input type="hidden" name="paket" id="paketInput" />

      <div data-paket="permintaan khusus" class="paket-option border rounded-xl shadow-md p-6 cursor-pointer transition duration-300 mb-6">
        <label for="request_custom" class="block text-sm font-medium text-gray-700 mb-2">Permintaan khusus:</label>
        <textarea id="request_custom" name="request_custom" rows="4" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="Tulis permintaan khusus Anda di sini..."></textarea>
      </div>

      <div class="flex justify-between mt-8">
        <a href="{{ route('home') }}"
          class="bg-red-500 hover:bg-red-600 text-white font-semibold py-3 px-8 rounded-md text-lg shadow-md transition duration-300">
          <i></i> Batal Booking
        </a>

        <button type="submit"
          class="bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-8 rounded-md text-lg shadow-md transition duration-300">
          <i></i> Simpan Booking
        </button>
      </div>
    </form>


  </div>

  <script>
    document.querySelectorAll('.paket-option').forEach(option => {
      option.addEventListener('click', () => {
        document.querySelectorAll('.paket-option').forEach(el => el.classList.remove('selected'));
        option.classList.add('selected');

        const paketDipilih = option.getAttribute('data-paket');
        console.log("Paket dipilih:", paketDipilih);

        // Update Alpine.js dropdown value jika ada
        const paketDropdown = document.querySelector('[x-data]');
        if (paketDropdown && paketDropdown.__x) {
          paketDropdown.__x.$data.selectedPaket = paketDipilih;
        }
      });
    });
  </script>

  <script>
    document.querySelectorAll('.paket-option').forEach(option => {
      option.addEventListener('click', () => {
        document.querySelectorAll('.paket-option').forEach(el => el.classList.remove('selected'));
        option.classList.add('selected');
        const paketDipilih = option.getAttribute('data-paket');
        document.getElementById('input-paket').value = paketDipilih;
      });
    });
  </script>

  <script>
    document.querySelectorAll('.paket-option').forEach(function(option) {
      option.addEventListener('click', function() {
        const selectedHarga = this.getAttribute('data-harga');
        document.getElementById('hargaPaket').value = selectedHarga;
      });
    });
  </script>

  <script>
    const tanggalGrid = document.getElementById('tanggalGrid');
    const tanggalInput = document.getElementById('tanggalInput');
    const paketPilihanDiv = document.getElementById('paketPilihan');

    let tanggalDipilih = null;
    let paketDipilih = null;
    let selectedPaketElement = null;

    const tanggalBooked = [3, 5, 10, 12, 22];
    const tanggalSebagianBooked = [6, 14, 18];

    for (let i = 1; i <= 30; i++) {
      const btn = document.createElement('button');
      btn.textContent = i;
      btn.className = "p-3 rounded-md text-white focus:outline-none text-sm sm:text-base transition duration-200";

      if (tanggalBooked.includes(i)) {
        btn.classList.add("bg-red-400", "cursor-not-allowed");
        btn.disabled = true;
      } else if (tanggalSebagianBooked.includes(i)) {
        btn.classList.add("bg-yellow-400", "hover:bg-yellow-500");
        btn.onclick = () => handleTanggalClick(i, true);
      } else {
        btn.classList.add("bg-gray-300", "hover:bg-green-500");
        btn.onclick = () => handleTanggalClick(i, false);
      }

      tanggalGrid.appendChild(btn);
    }

    let selectedMonthFromAlpine = new Date().getMonth() + 1;

    window.addEventListener('bulan-dipilih', function(event) {
      selectedMonthFromAlpine = event.detail.bulan;
    });


    function handleTanggalClick(i, isSebagian) {
      resetTanggal();

      const btns = document.querySelectorAll('#tanggalGrid button');
      btns[i - 1].classList.add("ring", "ring-4", isSebagian ? "ring-yellow-400" : "ring-green-400");
      tanggalDipilih = i;

      const month = String(selectedMonthFromAlpine).padStart(2, '0');
      const day = String(i).padStart(2, '0');
      const year = new Date().getFullYear();
      const tanggalLengkap = `${year}-${month}-${day}`;

      tanggalInput.value = tanggalLengkap;
      console.log('Tanggal dipilih:', tanggalLengkap);
    }

    function resetTanggal() {
      document.querySelectorAll('#tanggalGrid button').forEach(b => {
        if (!b.disabled) b.classList.remove("ring", "ring-4", "ring-yellow-300", "ring-green-300",
          "ring-yellow-400", "ring-green-400");
      });
    }

    // Paket
    paketPilihanDiv?.addEventListener('click', function(event) {
      const clickedElement = event.target.closest('.paket-option');
      if (clickedElement) {
        const paket = clickedElement.dataset.paket;
        pilihPaket(paket, clickedElement);
      }
    });

    function pilihPaket(paket, element) {
      if (selectedPaketElement && selectedPaketElement !== element) {
        selectedPaketElement.classList.remove('selected');
      }
      element.classList.add('selected');
      selectedPaketElement = element;
      paketDipilih = paket;
      document.querySelector('input[name="paket"]').value = paket;
    }
  </script>


  {{-- Validasi Inputan --}}
  <script>
    document.querySelector('form').addEventListener('submit', function(event) {
      const tanggal = document.getElementById('tanggalInput').value;
      const jam = document.getElementById('jamInput').value;
      const paket = document.getElementById('paketInput').value;
      const harga = document.getElementById('hargaPaket').value;

      if (!tanggal || !jam || !paket || !harga) {
        event.preventDefault();
        alert('Semua field harus diisi!');
      }
    });
  </script>

  <script>
    document.getElementById('bookingForm').addEventListener('submit', function(e) {
      const tanggal = document.getElementById('tanggalInput').value;

      if (!tanggal) {
        e.preventDefault();
        alert('Silakan pilih tanggal terlebih dahulu sebelum menyimpan booking.');
      }
    });
  </script>

  <script src="//unpkg.com/alpinejs" defer></script>
</body>

</html>