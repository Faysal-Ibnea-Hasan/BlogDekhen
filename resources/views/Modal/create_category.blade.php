<!-- Open the modal using ID.showModal() method -->
<dialog id="my_modal_5_category" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <h3 class="text-lg font-bold">Create Category</h3>
        <div class="mt-5">
            <label for="name"
                class="block overflow-hidden rounded-md border border-gray-200 px-3 py-2 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                <span class="text-xs font-medium text-gray-700"> Category </span>
                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                <input required type="text" id="name" placeholder="Category name" name="name"
                    class="mt-1 w-full border-none p-0 focus:border-transparent focus:outline-none focus:ring-0 sm:text-sm" />
            </label>
            <div class="flex justify-between">
                <button id="category" onclick="my_modal_5_category.close()" class="btn mt-5">Create</button>
                <button id="category" onclick="my_modal_5_category.close()" class="btn mt-5">Close</button>
            </div>
        </div>
    </div>
</dialog>
