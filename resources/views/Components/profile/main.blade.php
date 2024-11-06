<div id="profile-container"
     class="hidden fixed top-24 right-6 w-[400px] h-[300px] bg-white-theme rounded-xl shadow-2xl">
    <div class="flex pl-4 h-[80px] border-b-2">
        <button>
            <img src="https://placehold.co/50x50" alt="">
        </button>
    </div>
    <div class="flex flex-col gap-4 mt-4">
        <div class="flex pl-4 items-center gap-4">
            <button>
                <img src="https://placehold.co/50x50" alt="">
            </button>
            <p>Profile</p>
        </div>
        <div class="flex pl-4 items-center gap-4">
            <button>
                <img src="https://placehold.co/50x50" alt="">
            </button>
            <p>Settings</p>
        </div>
    </div>
</div>

<script>
    const userProfileBtn = document.querySelector('#profile-btn')
    const profileContaienr = document.querySelector('#profile-container')

    userProfileBtn
        .addEventListener('click', () => {
            profileContaienr.classList.toggle('hidden')
        })
</script>
