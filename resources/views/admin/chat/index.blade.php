@extends('layout.admin')
@section('content')
    <div id="top" class="sa-app__body d-flex">
        <div class="sa-chat sa-chat--open flex-grow-1">
            <div class="sa-chat__sidebar">
                <div class="sa-chat__header">
                    <div class="sa-chat__header-avatar sa-symbol sa-symbol--shape--circle"><img
                            src="images/customers/customer-4-64x64.jpg" width="64" height="64" alt=""></div>
                    <input type="text" placeholder="Search over contacts" class="form-control form-control--search">
                </div>
                <ul class="sa-chat__contacts" data-simplebar="init">
                    <div class="simplebar-wrapper" style="margin: 0px 0px -64px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                                    <div class="simplebar-content" style="padding: 0px 0px 64px;">

                                        <li class="sa-chat__contact">
                                            <div
                                                class="sa-chat__contact-avatar sa-symbol sa-symbol--status--online sa-symbol--shape--circle">
                                                <img src="https://cdn.vectorstock.com/i/preview-1x/69/65/admin-group-icon-simple-style-vector-27506965.jpg"
                                                    width="64" height="64" alt="">
                                                <div class="sa-symbol__status"></div>
                                            </div>
                                            <div class="sa-chat__contact-name">Admin Group</div>
                                            <div class="sa-chat__contact-meta">In the 19th century, the growth of modern
                                                research universities led academic philosophy and othe r disciplines to
                                                professionalize and specialize.</div>
                                            <div class="sa-chat__contact-date">2 hours</div>
                                        </li>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: auto; height: 790px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                        <div class="simplebar-scrollbar"
                            style="height: 488px; display: block; transform: translate3d(0px, 0px, 0px);"></div>
                    </div>
                </ul>
            </div>
            <div class="sa-chat__main">
                <div class="sa-chat__header"><button type="button" class="btn btn-sa-muted sa-chat__header-back"><svg
                            xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-arrow-left">
                            <line x1="19" y1="12" x2="5" y2="12"></line>
                            <polyline points="12 19 5 12 12 5"></polyline>
                        </svg></button>
                    <div class="sa-chat__header-avatar sa-symbol sa-symbol--status--online sa-symbol--shape--circle"><img
                            src="https://cdn.vectorstock.com/i/preview-1x/69/65/admin-group-icon-simple-style-vector-27506965.jpg"
                            width="64" height="64" alt="">
                        <div class="sa-symbol__status"></div>
                    </div>
                    <div class="sa-chat__header-info">
                        <div class="sa-chat__header-title">Admin Group</div>
                        <div class="sa-chat__header-meta">Last seen 7 days ago</div>
                    </div>
                    <div class="sa-chat__header-actions"><button type="button"
                            class="btn btn-sa-muted btn-sa-icon fs-exact-20" data-bs-toggle="tooltip" title=""
                            data-bs-original-title="Call" aria-label="Call"><svg xmlns="http://www.w3.org/2000/svg"
                                width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-phone">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                </path>
                            </svg></button><button type="button" class="btn btn-sa-muted btn-sa-icon fs-exact-20"
                            data-bs-toggle="tooltip" title="" data-bs-original-title="More" aria-label="More"><svg
                                xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-more-vertical">
                                <circle cx="12" cy="12" r="1"></circle>
                                <circle cx="12" cy="5" r="1"></circle>
                                <circle cx="12" cy="19" r="1"></circle>
                            </svg></button></div>
                </div>
                <div class="sa-chat__messages">
                    <div class="sa-chat__divider">7 October</div>
                    <div class="sa-chat__message sa-chat__message--opposite">
                        <div class="sa-chat__message-avatar">
                            <div class="sa-symbol sa-symbol--shape--circle"><img
                                    src="images/customers/customer-4-64x64.jpg" width="64" height="64"
                                    alt=""></div>
                        </div>
                        <div class="sa-chat__message-parts">
                            <div class="sa-chat__message-part dropdown">
                                <div class="sa-chat__message-text">Hello</div><button class="sa-chat__message-actions"
                                    data-bs-toggle="dropdown" aria-expanded="false" aria-label="More"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-more-vertical">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="12" cy="5" r="1"></circle>
                                        <circle cx="12" cy="19" r="1"></circle>
                                    </svg></button>
                                <ul class="dropdown-menu" aria-label="Chat message context menu">
                                    <li><a class="dropdown-item" href="#">Reply</a></li>
                                    <li><a class="dropdown-item" href="#">Copy Text</a></li>
                                    <li><a class="dropdown-item" href="#">Forward Message</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                </ul>
                            </div>
                            <div class="sa-chat__message-part dropdown">
                                <div class="sa-chat__message-text">What do you think about this?</div><button
                                    class="sa-chat__message-actions" data-bs-toggle="dropdown" aria-expanded="false"
                                    aria-label="More"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-more-vertical">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="12" cy="5" r="1"></circle>
                                        <circle cx="12" cy="19" r="1"></circle>
                                    </svg></button>
                                <ul class="dropdown-menu" aria-label="Chat message context menu">
                                    <li><a class="dropdown-item" href="#">Reply</a></li>
                                    <li><a class="dropdown-item" href="#">Copy Text</a></li>
                                    <li><a class="dropdown-item" href="#">Forward Message</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                </ul>
                            </div>
                            <div class="sa-chat__message-part dropdown">
                                <div class="sa-chat__message-text">In the 19th century, the growth of modern research
                                    universities led academic philosophy and other disciplines to professionalize and
                                    specialize. Since then, various areas of investigation that were traditionally part of
                                    philosophy have become separate academic disciplines, such as psychology.</div><button
                                    class="sa-chat__message-actions" data-bs-toggle="dropdown" aria-expanded="false"
                                    aria-label="More"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-more-vertical">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="12" cy="5" r="1"></circle>
                                        <circle cx="12" cy="19" r="1"></circle>
                                    </svg></button>
                                <ul class="dropdown-menu" aria-label="Chat message context menu">
                                    <li><a class="dropdown-item" href="#">Reply</a></li>
                                    <li><a class="dropdown-item" href="#">Copy Text</a></li>
                                    <li><a class="dropdown-item" href="#">Forward Message</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sa-chat__message-time">Adam Taylor – 18:46</div>
                    </div>
                    <div class="sa-chat__message">
                        <div class="sa-chat__message-avatar">
                            <div class="sa-symbol sa-symbol--shape--circle"><img
                                    src="images/customers/customer-4-64x64.jpg" width="64" height="64"
                                    alt=""></div>
                        </div>
                        <div class="sa-chat__message-parts">
                            <div class="sa-chat__message-part dropdown">
                                <div class="sa-chat__message-text">Well</div><button class="sa-chat__message-actions"
                                    data-bs-toggle="dropdown" aria-expanded="false" aria-label="More"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-more-vertical">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="12" cy="5" r="1"></circle>
                                        <circle cx="12" cy="19" r="1"></circle>
                                    </svg></button>
                                <ul class="dropdown-menu" aria-label="Chat message context menu">
                                    <li><a class="dropdown-item" href="#">Reply</a></li>
                                    <li><a class="dropdown-item" href="#">Copy Text</a></li>
                                    <li><a class="dropdown-item" href="#">Forward Message</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                </ul>
                            </div>
                            <div class="sa-chat__message-part dropdown">
                                <div class="sa-chat__message-text">Basically this looks good</div><button
                                    class="sa-chat__message-actions" data-bs-toggle="dropdown" aria-expanded="false"
                                    aria-label="More"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-more-vertical">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="12" cy="5" r="1"></circle>
                                        <circle cx="12" cy="19" r="1"></circle>
                                    </svg></button>
                                <ul class="dropdown-menu" aria-label="Chat message context menu">
                                    <li><a class="dropdown-item" href="#">Reply</a></li>
                                    <li><a class="dropdown-item" href="#">Copy Text</a></li>
                                    <li><a class="dropdown-item" href="#">Forward Message</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                </ul>
                            </div>
                            <div class="sa-chat__message-part dropdown">
                                <div class="sa-chat__message-text">Can you suggest other variants?</div><button
                                    class="sa-chat__message-actions" data-bs-toggle="dropdown" aria-expanded="false"
                                    aria-label="More"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-more-vertical">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="12" cy="5" r="1"></circle>
                                        <circle cx="12" cy="19" r="1"></circle>
                                    </svg></button>
                                <ul class="dropdown-menu" aria-label="Chat message context menu">
                                    <li><a class="dropdown-item" href="#">Reply</a></li>
                                    <li><a class="dropdown-item" href="#">Copy Text</a></li>
                                    <li><a class="dropdown-item" href="#">Forward Message</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sa-chat__message-time">Ryan Ford – 18:46 - Delivered</div>
                    </div>
                    <div class="sa-chat__message sa-chat__message--opposite">
                        <div class="sa-chat__message-avatar">
                            <div class="sa-symbol sa-symbol--shape--circle"><img
                                    src="images/customers/customer-4-64x64.jpg" width="64" height="64"
                                    alt=""></div>
                        </div>
                        <div class="sa-chat__message-parts">
                            <div class="sa-chat__message-part dropdown">
                                <div class="sa-chat__message-text">Yes, sure</div><button class="sa-chat__message-actions"
                                    data-bs-toggle="dropdown" aria-expanded="false" aria-label="More"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-more-vertical">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="12" cy="5" r="1"></circle>
                                        <circle cx="12" cy="19" r="1"></circle>
                                    </svg></button>
                                <ul class="dropdown-menu" aria-label="Chat message context menu">
                                    <li><a class="dropdown-item" href="#">Reply</a></li>
                                    <li><a class="dropdown-item" href="#">Copy Text</a></li>
                                    <li><a class="dropdown-item" href="#">Forward Message</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                </ul>
                            </div>
                            <div class="sa-chat__message-part dropdown">
                                <div class="sa-chat__message-text">These groupings allow philosophers to focus on a set of
                                    similar topics and interact with other thinkers who are interested in the same
                                    questions.</div><button class="sa-chat__message-actions" data-bs-toggle="dropdown"
                                    aria-expanded="false" aria-label="More"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="1em" height="1em" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-more-vertical">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="12" cy="5" r="1"></circle>
                                        <circle cx="12" cy="19" r="1"></circle>
                                    </svg></button>
                                <ul class="dropdown-menu" aria-label="Chat message context menu">
                                    <li><a class="dropdown-item" href="#">Reply</a></li>
                                    <li><a class="dropdown-item" href="#">Copy Text</a></li>
                                    <li><a class="dropdown-item" href="#">Forward Message</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sa-chat__message-time">Adam Taylor – 18:46</div>
                    </div>
                    <div class="sa-chat__message">
                        <div class="sa-chat__message-avatar">
                            <div class="sa-symbol sa-symbol--shape--circle"><img
                                    src="images/customers/customer-4-64x64.jpg" width="64" height="64"
                                    alt=""></div>
                        </div>
                        <div class="sa-chat__message-parts">
                            <div class="sa-chat__message-part dropdown">
                                <div class="sa-chat__message-text">Sorry, but I need to run, let's discuss this later</div>
                                <button class="sa-chat__message-actions" data-bs-toggle="dropdown" aria-expanded="false"
                                    aria-label="More"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-more-vertical">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="12" cy="5" r="1"></circle>
                                        <circle cx="12" cy="19" r="1"></circle>
                                    </svg></button>
                                <ul class="dropdown-menu" aria-label="Chat message context menu">
                                    <li><a class="dropdown-item" href="#">Reply</a></li>
                                    <li><a class="dropdown-item" href="#">Copy Text</a></li>
                                    <li><a class="dropdown-item" href="#">Forward Message</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                </ul>
                            </div>
                            <div class="sa-chat__message-part dropdown">
                                <div class="sa-chat__message-text">I'll write when I'm done.</div><button
                                    class="sa-chat__message-actions" data-bs-toggle="dropdown" aria-expanded="false"
                                    aria-label="More"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-more-vertical">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="12" cy="5" r="1"></circle>
                                        <circle cx="12" cy="19" r="1"></circle>
                                    </svg></button>
                                <ul class="dropdown-menu" aria-label="Chat message context menu">
                                    <li><a class="dropdown-item" href="#">Reply</a></li>
                                    <li><a class="dropdown-item" href="#">Copy Text</a></li>
                                    <li><a class="dropdown-item" href="#">Forward Message</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sa-chat__message-time">Ryan Ford – 18:46 - Delivered</div>
                    </div>
                    <div class="sa-chat__message sa-chat__message--opposite">
                        <div class="sa-chat__message-avatar">
                            <div class="sa-symbol sa-symbol--shape--circle"><img
                                    src="images/customers/customer-4-64x64.jpg" width="64" height="64"
                                    alt=""></div>
                        </div>
                        <div class="sa-chat__message-parts">
                            <div class="sa-chat__message-part dropdown">
                                <div class="sa-chat__message-text">Well I will wait</div><button
                                    class="sa-chat__message-actions" data-bs-toggle="dropdown" aria-expanded="false"
                                    aria-label="More"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-more-vertical">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="12" cy="5" r="1"></circle>
                                        <circle cx="12" cy="19" r="1"></circle>
                                    </svg></button>
                                <ul class="dropdown-menu" aria-label="Chat message context menu">
                                    <li><a class="dropdown-item" href="#">Reply</a></li>
                                    <li><a class="dropdown-item" href="#">Copy Text</a></li>
                                    <li><a class="dropdown-item" href="#">Forward Message</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sa-chat__message-time">Adam Taylor – 18:46</div>
                    </div>
                    <div class="sa-chat__divider">1 January</div>
                    <div class="sa-chat__message">
                        <div class="sa-chat__message-avatar">
                            <div class="sa-symbol sa-symbol--shape--circle"><img
                                    src="images/customers/customer-4-64x64.jpg" width="64" height="64"
                                    alt=""></div>
                        </div>
                        <div class="sa-chat__message-parts">
                            <div class="sa-chat__message-part dropdown">
                                <div class="sa-chat__message-text">Hi Adam</div><button class="sa-chat__message-actions"
                                    data-bs-toggle="dropdown" aria-expanded="false" aria-label="More"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-more-vertical">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="12" cy="5" r="1"></circle>
                                        <circle cx="12" cy="19" r="1"></circle>
                                    </svg></button>
                                <ul class="dropdown-menu" aria-label="Chat message context menu">
                                    <li><a class="dropdown-item" href="#">Reply</a></li>
                                    <li><a class="dropdown-item" href="#">Copy Text</a></li>
                                    <li><a class="dropdown-item" href="#">Forward Message</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                </ul>
                            </div>
                            <div class="sa-chat__message-part dropdown">
                                <div class="sa-chat__message-text">I am back and ready for further discussions</div><button
                                    class="sa-chat__message-actions" data-bs-toggle="dropdown" aria-expanded="false"
                                    aria-label="More"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-more-vertical">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="12" cy="5" r="1"></circle>
                                        <circle cx="12" cy="19" r="1"></circle>
                                    </svg></button>
                                <ul class="dropdown-menu" aria-label="Chat message context menu">
                                    <li><a class="dropdown-item" href="#">Reply</a></li>
                                    <li><a class="dropdown-item" href="#">Copy Text</a></li>
                                    <li><a class="dropdown-item" href="#">Forward Message</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sa-chat__message-time">Ryan Ford – 18:46 - Delivered</div>
                    </div>
                    <div class="sa-chat__message sa-chat__message--opposite">
                        <div class="sa-chat__message-avatar">
                            <div class="sa-symbol sa-symbol--shape--circle"><img
                                    src="images/customers/customer-4-64x64.jpg" width="64" height="64"
                                    alt=""></div>
                        </div>
                        <div class="sa-chat__message-parts">
                            <div class="sa-chat__message-part dropdown">
                                <div class="sa-chat__message-text">Metaphysics is the study of the most general features of
                                    reality, such as existence, time, objects and their properties, wholes and their parts,
                                    events, processes and causation and the relationship between mind and body.</div><button
                                    class="sa-chat__message-actions" data-bs-toggle="dropdown" aria-expanded="false"
                                    aria-label="More"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-more-vertical">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="12" cy="5" r="1"></circle>
                                        <circle cx="12" cy="19" r="1"></circle>
                                    </svg></button>
                                <ul class="dropdown-menu" aria-label="Chat message context menu">
                                    <li><a class="dropdown-item" href="#">Reply</a></li>
                                    <li><a class="dropdown-item" href="#">Copy Text</a></li>
                                    <li><a class="dropdown-item" href="#">Forward Message</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                </ul>
                            </div>
                            <div class="sa-chat__message-part dropdown">
                                <div class="sa-chat__message-text">What about Metaphysics?</div><button
                                    class="sa-chat__message-actions" data-bs-toggle="dropdown" aria-expanded="false"
                                    aria-label="More"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-more-vertical">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="12" cy="5" r="1"></circle>
                                        <circle cx="12" cy="19" r="1"></circle>
                                    </svg></button>
                                <ul class="dropdown-menu" aria-label="Chat message context menu">
                                    <li><a class="dropdown-item" href="#">Reply</a></li>
                                    <li><a class="dropdown-item" href="#">Copy Text</a></li>
                                    <li><a class="dropdown-item" href="#">Forward Message</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sa-chat__message-time">Adam Taylor – 18:46</div>
                    </div>
                    <div class="sa-chat__message">
                        <div class="sa-chat__message-avatar">
                            <div class="sa-symbol sa-symbol--shape--circle"><img
                                    src="images/customers/customer-4-64x64.jpg" width="64" height="64"
                                    alt=""></div>
                        </div>
                        <div class="sa-chat__message-parts">
                            <div class="sa-chat__message-part dropdown">
                                <div class="sa-chat__message-text">Hmm</div><button class="sa-chat__message-actions"
                                    data-bs-toggle="dropdown" aria-expanded="false" aria-label="More"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-more-vertical">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="12" cy="5" r="1"></circle>
                                        <circle cx="12" cy="19" r="1"></circle>
                                    </svg></button>
                                <ul class="dropdown-menu" aria-label="Chat message context menu">
                                    <li><a class="dropdown-item" href="#">Reply</a></li>
                                    <li><a class="dropdown-item" href="#">Copy Text</a></li>
                                    <li><a class="dropdown-item" href="#">Forward Message</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                </ul>
                            </div>
                            <div class="sa-chat__message-part dropdown">
                                <div class="sa-chat__message-text">No, Metaphysics is a bad idea</div><button
                                    class="sa-chat__message-actions" data-bs-toggle="dropdown" aria-expanded="false"
                                    aria-label="More"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-more-vertical">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="12" cy="5" r="1"></circle>
                                        <circle cx="12" cy="19" r="1"></circle>
                                    </svg></button>
                                <ul class="dropdown-menu" aria-label="Chat message context menu">
                                    <li><a class="dropdown-item" href="#">Reply</a></li>
                                    <li><a class="dropdown-item" href="#">Copy Text</a></li>
                                    <li><a class="dropdown-item" href="#">Forward Message</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sa-chat__message-time">Ryan Ford – 18:46 - Delivered</div>
                    </div>
                </div>
                <div id="myForm" class="sa-chat__form d-flex">
                    <input type="text" id="inputField" placeholder="Hello, my name is Max" class="form-control">
                    <button id="submitButton" class="btn btn-primary ms-3" onclick="handleSubmit(event)">Send</button>
                </div>

                <script src="https://cdn.socket.io/4.4.1/socket.io.min.js"></script>

                <script>
                    function handleSubmit(e) {

                        var inputValue = document.getElementById('inputField').value;

                        // Kết nối tới máy chủ Socket.IO




                        socket.emit('chat-admin', {
                            'text': inputValue,
                            'sender': '{{ $user }}'
                        });
                        document.getElementById('inputField').value = ""

                        // Gửi một sự kiện từ máy khách tới máy chủ

                        // Lắng nghe sự kiện từ máy chủ
                        socket.on('chat-admin', (message) => {
                            console.log('Received message from server:', message);
                        });
                    }
                </script>
            </div>
        </div>
    </div>
@endsection
