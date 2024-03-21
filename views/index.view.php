<?php require 'partials/header.php'; ?>
<?php require 'partials/sidebar.php'; ?>
<div class="flex flex-col flex-grow border-l border-r border-gray-300">
    <div class="flex justify-between flex-shrink-0 px-8 py-4 border-b border-gray-300">
        <h1 class="text-xl font-semibold">Feed Title</h1>
        <button class="flex items-center h-8 px-2 text-sm bg-slate-500 rounded-lg hover:bg-slate-400">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg> New post</button>
    </div>
    <div class="flex-grow h-0 overflow-auto">
        <div class="flex w-full p-8 border-b-4 border-gray-300">
            <span class="flex-shrink-0 w-12 h-12 bg-gray-400 rounded-full"></span>
            <div class="flex flex-col flex-grow ml-4">
                <form action="/posts/create" method="post" enctype="multipart/form-data">
                    <textarea class="p-3 bg-transparent w-full border border-gray-500 rounded-sm focus:outline-none focus:border-blue-500" name="post_data" id="" rows="3" placeholder="What's happening?"></textarea>

                    <div class="flex justify-between mt-2">
                        <div>
                            <label for="file" class="mt-2">Image</label>
                            <input type="file" name="post_img" id="file" class="flex items-center h-8 px-3 text-xs rounded-sm hover:bg-slate-500">
                        </div>
                        <button type="submit" class="flex items-center mt-5 h-8 px-3 text-xs rounded-sm bg-slate-500 hover:bg-slate-400 text-white">Post</button>
                    </div>
                </form>

            </div>
        </div>

        <?php foreach ($posts as $post) : ?>
            <div class="flex w-full p-8 border-b border-gray-300">
                <span class="flex-shrink-0 w-12 h-12 bg-gray-400 rounded-full"></span>
                <div class="flex flex-col flex-grow ml-4">

                    <div class="flex">
                        <span class="font-semibold">Username</span>
                        <span class="ml-1">@username</span>
                        <span class="ml-auto text-sm text-white"><?php echo $post['post_timedate'] ?></span>
                    </div>
                    <p class="mt-1"><?php echo $post['post_data'] ?> <a class="underline" href="#">#hashtag</a></p>

                    <div class="flex items-center justify-center h-64 mt-2 bg-gray-200">
                        <?php if (!empty($post['post_img'])) : ?>
                            <img src="/uploads/<?php echo $post['post_img']; ?>" alt="Post Image" class="max-h-full max-w-full">
                        <?php else : ?>
                            <span class="font-semibold text-gray-500">No Image</span>
                        <?php endif; ?>
                    </div>


                    <div class="flex justify-around m-3">
                        <div class="flex flex-row">
                            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="bg-sky-500 opacity-75 hover:opacity-100 text-black-900 hover:text-gray-900 rounded-full px-4 py-2 font-semibold" type="button"><i class="mdi mdi-pencil -ml-2 mr-2"></i>
                                UPDATE
                            </button>
                        </div>

                        <!-- <div class="flex flex-row">
                            <a href=""><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mt-1 mr-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg></a>
                            <button class=" text-sm font-semibold">
                                Reply</button>
                        </div> -->

                        <div class="flex flex-row">

                            <!-- <a href="/posts/delete?id=">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </a>
                            <button class=" text-sm font-semibold">
                                Delete</button> -->



                            <a id="deleteButton" data-modal-target="deleteModal" data-modal-toggle="deleteModal" class="bg-red-500 opacity-75 hover:opacity-100 text-black-900 hover:text-gray-900 rounded-full px-4 py-2 font-semibold"><i class="mdi mdi-delete -ml-2 mr-2"></i>DELETE</a>

                            <div id="deleteModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                    <!-- Modal content -->
                                    <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                        <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                                        <div class="flex justify-center items-center space-x-4">
                                            <button data-modal-toggle="deleteModal" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                No, cancel
                                            </button>
                                            <a href="/posts/delete?post_id=<?php echo $post["post_id"]; ?>">
                                                <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                    Yes, I'm sure
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="flex w-full p-8 border-b border-gray-300">
            <span class="flex-shrink-0 w-12 h-12 bg-gray-400 rounded-full"></span>
            <div class="flex flex-col flex-grow ml-4">
                <div class="flex">
                    <span class="font-semibold">Username</span>
                    <span class="ml-1">@username</span>
                    <span class="ml-auto text-sm">Just now</span>
                </div>
                <p class="mt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. <a class="underline" href="#">#hashtag</a></p>
                <div class="flex items-center justify-center h-64 mt-2 bg-gray-200">
                    <span class="font-semibold text-gray-500">Image</span>
                </div>
                <div class="flex mt-2">
                    <button class="text-sm font-semibold">Like</button>
                    <button class="ml-2 text-sm font-semibold">Reply</button>
                    <button class="ml-2 text-sm font-semibold">Share</button>
                </div>
            </div>
        </div>
        <div class="flex w-full p-8 border-b border-gray-300">
            <span class="flex-shrink-0 w-12 h-12 bg-gray-400 rounded-full"></span>
            <div class="flex flex-col flex-grow ml-4">
                <div class="flex">
                    <span class="font-semibold">Username</span>
                    <span class="ml-1">@username</span>
                    <span class="ml-auto text-sm">Just now</span>
                </div>
                <p class="mt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. <a class="underline" href="#">#hashtag</a></p>
                <div class="flex mt-2">
                    <button class="text-sm font-semibold">Like</button>
                    <button class="ml-2 text-sm font-semibold">Reply</button>
                    <button class="ml-2 text-sm font-semibold">Share</button>
                </div>
            </div>
        </div>
        <div class="flex w-full p-8 border-b border-gray-300">
            <span class="flex-shrink-0 w-12 h-12 bg-gray-400 rounded-full"></span>
            <div class="flex flex-col flex-grow ml-4">
                <div class="flex">
                    <span class="font-semibold">Username</span>
                    <span class="ml-1">@username</span>
                    <span class="ml-auto text-sm">Just now</span>
                </div>
                <p class="mt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. <a class="underline" href="#">#hashtag</a></p>
                <div class="flex mt-2">
                    <button class="text-sm font-semibold">Like</button>
                    <button class="ml-2 text-sm font-semibold">Reply</button>
                    <button class="ml-2 text-sm font-semibold">Share</button>
                </div>
            </div>
        </div>
        <div class="flex w-full p-8 border-b border-gray-300">
            <span class="flex-shrink-0 w-12 h-12 bg-gray-400 rounded-full"></span>
            <div class="flex flex-col flex-grow ml-4">
                <div class="flex">
                    <span class="font-semibold">Username</span>
                    <span class="ml-1">@username</span>
                    <span class="ml-auto text-sm">Just now</span>
                </div>
                <p class="mt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. <a class="underline" href="#">#hashtag</a></p>
                <div class="flex items-center justify-center h-64 mt-2 bg-gray-200">
                    <span class="font-semibold text-gray-500">Image</span>
                </div>
                <div class="flex mt-2">
                    <button class="text-sm font-semibold">Like</button>
                    <button class="ml-2 text-sm font-semibold">Reply</button>
                    <button class="ml-2 text-sm font-semibold">Share</button>
                </div>
            </div>
        </div>
        <div class="flex w-full p-8 border-b border-gray-300">
            <span class="flex-shrink-0 w-12 h-12 bg-gray-400 rounded-full"></span>
            <div class="flex flex-col flex-grow ml-4">
                <div class="flex">
                    <span class="font-semibold">Username</span>
                    <span class="ml-1">@username</span>
                    <span class="ml-auto text-sm">Just now</span>
                </div>
                <p class="mt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. <a class="underline" href="#">#hashtag</a></p>
                <div class="flex items-center justify-center h-64 mt-2 bg-gray-200">
                    <span class="font-semibold text-gray-500">Image</span>
                </div>
                <div class="flex mt-2">
                    <button class="text-sm font-semibold">Like</button>
                    <button class="ml-2 text-sm font-semibold">Reply</button>
                    <button class="ml-2 text-sm font-semibold">Share</button>
                </div>
            </div>
        </div> -->
            <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Create New Product
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form class="p-4 md:p-5" enctype="multipart/form-data" action="/posts/update?post_id=<?php echo $post['post_id']; ?>" method="post">
                            <div class="grid gap-4 mb-4 grid-cols-2">

                                <div class="col-span-2">
                                    <label for="post_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post Title</label>
                                    <input type="text" name="post_data" id="post_data" value="<?php echo $post["post_data"];  ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Hello Good Moring!" required="">
                                </div>
                                <div class="col-span-2">
                                    <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post Title</label>
                                    <div class="mt-2 flex justify-center rounded-lg border  px-6 py-10">
                                        <div class="text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                            </svg>
                                            <div class="mt-4 flex text-sm leading-6 text-gray-900">
                                                <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                    <span>Upload a file</span>
                                                    <input id="file-upload" name="post_img" type="file" class="sr-only">
                                                    <input type="hidden" name="post_img_old" value="<?php echo $post['post_img']; ?>">
                                                </label>
                                                <p class="pl-1">or drag and drop</p>
                                            </div>
                                            <p class="text-xs leading-5 text-gray-900">PNG, JPG, GIF up to 10MB</p>
                                        </div>
                                    </div>
                                    <input type="hidden" name="existing_photo" value="">
                                </div>


                            </div>
                            <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                </svg>
                                Updata Post
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>




<?php require 'partials/trending.php'; ?>
<?php require 'partials/footer.php'; ?>