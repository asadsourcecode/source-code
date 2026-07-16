<div>

<div class="bg-white border-2 border-[#216C221A] rounded-[16px] pt-[18px] pb-[32px] px-[24px] flex flex-col gap-[24px]">

    {{-- Header: back + heading + profile card (left) / Save Changes (right) --}}
    <div class="border-b border-[#216C2233] pb-[17px] flex items-end justify-between w-full">
        <div class="flex flex-col gap-[16px] items-start">
            <div class="flex gap-[8px] items-center">
                <a href="{{ route('teacher.dashboard') }}" wire:navigate class="w-[32px] h-[32px] flex items-center justify-center text-[#1B1C1B]">
                    <i class="fa-solid fa-chevron-left text-[18px]"></i>
                </a>
                <h2 class="font-['Montserrat',sans-serif] font-bold text-[24px] leading-[31.2px] text-[#1B1C1B]">
                    My Profile
                </h2>
            </div>

            <div class="bg-white flex items-center pt-[16px] px-[16px] rounded-[12px] w-[608px]">
                <div class="flex gap-[8px] items-center">
                    <div class="relative shrink-0">
                        <div class="border-2 border-[#216C2233] rounded-full w-[70px] h-[70px] overflow-hidden">
                            <img src="{{ asset('images/girl.jpg') }}" alt="{{ $firstName }} {{ $lastName }}" class="w-full h-full object-cover">
                        </div>
                        <div class="absolute bottom-0 right-0 w-[20px] h-[20px] bg-[#216C22] border-2 border-white rounded-full flex items-center justify-center">
                            <i class="fa-solid fa-camera text-white text-[9px]"></i>
                        </div>
                    </div>
                    <div class="flex flex-col items-start">
                        <span class="font-['Hanken_Grotesk',sans-serif] font-semibold text-[24px] leading-[25.2px] text-[#46494B]">{{ $firstName }} {{ $lastName }}</span>
                        <span class="font-['Hanken_Grotesk',sans-serif] font-normal text-[14px] leading-[21px] text-[#46494B]">{{ $role }}</span>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="bg-[#216C22] h-[48px] rounded-[12px] px-[32px] py-[16px] flex items-center justify-center font-['Work_Sans',sans-serif] font-bold text-[16px] text-white hover:bg-green-900 transition">
            Save Changes
        </button>
    </div>

    {{-- Form fields --}}
    <div class="flex flex-col gap-[24px] w-full">

        <div class="flex gap-[24px] items-start w-full">
            <div class="flex-1 flex flex-col gap-[6px]">
                <label class="font-['Hanken_Grotesk',sans-serif] font-bold text-[14px] tracking-[0.6px] text-[#46494B]">First name</label>
                <input type="text" name="first_name" value="{{ $firstName }}" class="bg-white border-2 border-[#E4EBF6] shadow-[0px_0px_2px_0px_rgba(0,0,0,0.04)] rounded-[8px] px-[17px] py-[13px] w-full font-['Hanken_Grotesk',sans-serif] font-normal text-[16px] text-[#46494B] outline-none">
            </div>
            <div class="flex-1 flex flex-col gap-[6px]">
                <label class="font-['Hanken_Grotesk',sans-serif] font-bold text-[14px] tracking-[0.6px] text-[#46494B]">Last Name</label>
                <input type="text" name="last_name" value="{{ $lastName }}" class="bg-white border-2 border-[#E4EBF6] shadow-[0px_0px_2px_0px_rgba(0,0,0,0.04)] rounded-[8px] px-[17px] py-[13px] w-full font-['Hanken_Grotesk',sans-serif] font-normal text-[16px] text-[#46494B] outline-none">
            </div>
        </div>

        <div class="flex flex-col gap-[6px] w-full">
            <label class="font-['Hanken_Grotesk',sans-serif] font-bold text-[14px] tracking-[0.6px] text-[#46494B]">Email Address</label>
            <input type="email" name="email" value="{{ $email }}" class="bg-white border-2 border-[#E4EBF6] shadow-[0px_0px_2px_0px_rgba(0,0,0,0.04)] rounded-[8px] px-[17px] py-[13px] w-full font-['Hanken_Grotesk',sans-serif] font-normal text-[16px] text-[#46494B] outline-none">
        </div>

        <div class="flex gap-[24px] items-start w-full">
            <div class="flex-1 flex flex-col gap-[6px]">
                <label class="font-['Hanken_Grotesk',sans-serif] font-bold text-[14px] tracking-[0.6px] text-[#46494B]">Phone Number</label>
                <input type="text" name="phone" value="{{ $phone }}" class="bg-white border-2 border-[#E4EBF6] shadow-[0px_0px_2px_0px_rgba(0,0,0,0.04)] rounded-[8px] px-[17px] py-[13px] w-full font-['Hanken_Grotesk',sans-serif] font-normal text-[16px] text-[#46494B] outline-none">
            </div>
            <div class="flex-1 flex flex-col gap-[6px]">
                <label class="font-['Hanken_Grotesk',sans-serif] font-bold text-[14px] tracking-[0.6px] text-[#46494B]">Whatsapp Number</label>
                <div class="bg-white border-2 border-[#E4EBF6] shadow-[0px_0px_2px_0px_rgba(0,0,0,0.04)] rounded-[8px] px-[17px] py-[13px] w-full flex items-center justify-between">
                    <input type="text" name="whatsapp" value="{{ $whatsapp }}" class="flex-1 font-['Hanken_Grotesk',sans-serif] font-normal text-[16px] text-[#46494B] outline-none">
                    <i class="fa-solid fa-chevron-down text-[#46494B] text-[14px]"></i>
                </div>
            </div>
        </div>

        <div class="flex gap-[24px] items-start w-full">
            <div class="flex-1 flex flex-col gap-[6px]">
                <label class="font-['Hanken_Grotesk',sans-serif] font-bold text-[14px] tracking-[0.6px] text-[#46494B]">Date Of Birth</label>
                <div class="bg-white border-2 border-[#E4EBF6] shadow-[0px_0px_2px_0px_rgba(0,0,0,0.04)] rounded-[8px] px-[17px] py-[13px] w-full flex items-center justify-between">
                    <input type="date" name="dob" value="{{ $dob }}" placeholder="DD-MM-YY" class="flex-1 font-['Hanken_Grotesk',sans-serif] font-normal text-[16px] text-[#46494B] outline-none">
                </div>
            </div>
            <div class="flex-1 flex flex-col gap-[6px]">
                <label class="font-['Hanken_Grotesk',sans-serif] font-bold text-[14px] tracking-[0.6px] text-[#46494B]">Gender</label>
                <div class="bg-white border-2 border-[#E4EBF6] shadow-[0px_0px_2px_0px_rgba(0,0,0,0.04)] rounded-[8px] px-[17px] py-[13px] w-full flex items-center justify-between">
                    <select name="gender" class="flex-1 font-['Hanken_Grotesk',sans-serif] font-normal text-[16px] text-[#46494B] outline-none bg-transparent appearance-none">
                        <option {{ $gender === 'Female' ? 'selected' : '' }}>Female</option>
                        <option {{ $gender === 'Male' ? 'selected' : '' }}>Male</option>
                        <option {{ $gender === 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                    <i class="fa-solid fa-chevron-down text-[#46494B] text-[14px]"></i>
                </div>
            </div>
        </div>

        <div class="flex gap-[24px] items-start w-full">
            <div class="flex-1 flex flex-col gap-[6px]">
                <label class="font-['Hanken_Grotesk',sans-serif] font-bold text-[14px] tracking-[0.6px] text-[#46494B]">Qualification</label>
                <div class="bg-white border-2 border-[#E4EBF6] shadow-[0px_0px_2px_0px_rgba(0,0,0,0.04)] rounded-[8px] px-[17px] py-[13px] w-full flex items-center justify-between">
                    <input type="text" name="qualification" value="{{ $qualification }}" class="flex-1 font-['Hanken_Grotesk',sans-serif] font-normal text-[16px] text-[#46494B] outline-none">
                    <i class="fa-solid fa-chevron-down text-[#46494B] text-[14px]"></i>
                </div>
            </div>
            <div class="flex-1 flex flex-col gap-[6px]">
                <label class="font-['Hanken_Grotesk',sans-serif] font-bold text-[14px] tracking-[0.6px] text-[#46494B]">Profession</label>
                <div class="bg-white border-2 border-[#E4EBF6] shadow-[0px_0px_2px_0px_rgba(0,0,0,0.04)] rounded-[8px] px-[17px] py-[13px] w-full flex items-center justify-between">
                    <input type="text" name="profession" value="{{ $profession }}" class="flex-1 font-['Hanken_Grotesk',sans-serif] font-normal text-[16px] text-[#46494B] outline-none">
                    <i class="fa-solid fa-chevron-down text-[#46494B] text-[14px]"></i>
                </div>
            </div>
        </div>

        <div class="flex gap-[24px] items-start w-full">
            <div class="flex-1 flex flex-col gap-[6px]">
                <label class="font-['Hanken_Grotesk',sans-serif] font-bold text-[14px] tracking-[0.6px] text-[#46494B]">Country</label>
                <div class="bg-white border-2 border-[#E4EBF6] shadow-[0px_0px_2px_0px_rgba(0,0,0,0.04)] rounded-[8px] px-[17px] py-[13px] w-full flex items-center justify-between">
                    <input type="text" name="country" value="{{ $country }}" class="flex-1 font-['Hanken_Grotesk',sans-serif] font-normal text-[16px] text-[#46494B] outline-none">
                    <i class="fa-solid fa-chevron-down text-[#46494B] text-[14px]"></i>
                </div>
            </div>
            <div class="flex-1 flex flex-col gap-[6px]">
                <label class="font-['Hanken_Grotesk',sans-serif] font-bold text-[14px] tracking-[0.6px] text-[#46494B]">State/Region</label>
                <div class="bg-white border-2 border-[#E4EBF6] shadow-[0px_0px_2px_0px_rgba(0,0,0,0.04)] rounded-[8px] px-[17px] py-[13px] w-full flex items-center justify-between">
                    <input type="text" name="state" value="{{ $state }}" class="flex-1 font-['Hanken_Grotesk',sans-serif] font-normal text-[16px] text-[#46494B] outline-none">
                    <i class="fa-solid fa-chevron-down text-[#46494B] text-[14px]"></i>
                </div>
            </div>
        </div>

        <div class="flex gap-[24px] items-start w-full">
            <div class="flex-1 flex flex-col gap-[6px]">
                <label class="font-['Hanken_Grotesk',sans-serif] font-bold text-[14px] tracking-[0.6px] text-[#46494B]">City</label>
                <input type="text" name="city" value="{{ $city }}" class="bg-white border-2 border-[#E4EBF6] shadow-[0px_0px_2px_0px_rgba(0,0,0,0.04)] rounded-[8px] px-[17px] py-[13px] w-full font-['Hanken_Grotesk',sans-serif] font-normal text-[16px] text-[#46494B] outline-none">
            </div>
            <div class="flex-1 flex flex-col gap-[6px]">
                <label class="font-['Hanken_Grotesk',sans-serif] font-bold text-[14px] tracking-[0.6px] text-[#46494B]">Postal Code</label>
                <input type="text" name="postal_code" value="{{ $postalCode }}" class="bg-white border-2 border-[#E4EBF6] shadow-[0px_0px_2px_0px_rgba(0,0,0,0.04)] rounded-[8px] px-[17px] py-[13px] w-full font-['Hanken_Grotesk',sans-serif] font-normal text-[16px] text-[#46494B] outline-none">
            </div>
        </div>
    </div>

</div>

</div>
