<template>
  <div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-lg-12 col-xl-12">
              <div
                class="
                  card card-custom
                  gutter-b
                  bg-transparent
                  shadow-none
                  border-0
                "
              >
                <div
                  class="card-header align-items-center border-bottom-dark px-0"
                >
                  <div class="card-title mb-0">
                    <h3 class="card-label mb-0 font-weight-bold text-body">
                      Order
                      <span class="text-black-50">#{{ orders.order_id }}</span>
                    </h3>
                  </div>
                  <div class="icons d-flex">
                  </div>
                </div>
                <div class="card-body pb-0 pt-4">
                  <div class="d-flex justify-content-center">
                    <ul
                      class="nav nav-pills mb-0"
                      id="pills-tab"
                      role="tablist"
                    >
                      <li class="nav-item">
                        <a
                          class="nav-link active"
                          id="detail-tab"
                          data-toggle="pill"
                          href="#detail"
                          role="tab"
                          aria-controls="detail"
                          aria-selected="true"
                        >
                          <svg
                            width="20px"
                            height="20px"
                            viewBox="0 0 16 16"
                            class="bi bi-file-earmark-text"
                            fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"
                            />
                            <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z" />
                            <path
                              fill-rule="evenodd"
                              d="M5 11.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"
                            />
                          </svg>
                          Detail</a
                        >
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          id="invoice-tab"
                          data-toggle="pill"
                          href="#invoice"
                          role="tab"
                          aria-controls="invoice"
                          aria-selected="false"
                        >
                          <svg
                            width="20px"
                            height="20px"
                            viewBox="0 0 16 16"
                            class="bi bi-receipt"
                            fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"
                            />
                            <path
                              fill-rule="evenodd"
                              d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"
                            />
                          </svg>
                          Invoice
                        </a>
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          id="status-tab"
                          data-toggle="pill"
                          href="#status"
                          role="tab"
                          aria-controls="status"
                          aria-selected="false"
                        >
                          <svg
                            width="20px"
                            height="20px"
                            viewBox="0 0 16 16"
                            class="bi bi-check2-square"
                            fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M15.354 2.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L8 9.293l6.646-6.647a.5.5 0 0 1 .708 0z"
                            />
                            <path
                              fill-rule="evenodd"
                              d="M1.5 13A1.5 1.5 0 0 0 3 14.5h10a1.5 1.5 0 0 0 1.5-1.5V8a.5.5 0 0 0-1 0v5a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V3a.5.5 0 0 1 .5-.5h8a.5.5 0 0 0 0-1H3A1.5 1.5 0 0 0 1.5 3v10z"
                            />
                          </svg>
                          Status
                        </a>
                      </li>
                      <li class="nav-item" v-if="setting.is_deliveryboyapp_purchased === '1'">
                        <a
                          class="nav-link"
                          id="delivery-tab"
                          data-toggle="pill"
                          href="#delivery"
                          role="tab"
                          aria-controls="delivery"
                          aria-selected="false"
                        >
                          <svg
                            width="1em"
                            height="1em"
                            viewBox="0 0 16 16"
                            class="bi bi-clock-delivery"
                            fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"
                            />
                            <path
                              fill-rule="evenodd"
                              d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"
                            />
                            <path
                              fill-rule="evenodd"
                              d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"
                            />
                          </svg>
                          Delivery
                        </a>
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          id="notes-tab"
                          data-toggle="pill"
                          href="#notes"
                          role="tab"
                          aria-controls="notes"
                          aria-selected="false"
                        >
                          <svg
                            width="1em"
                            height="1em"
                            viewBox="0 0 16 16"
                            class="bi bi-clock-notes"
                            fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"
                            />
                            <path
                              fill-rule="evenodd"
                              d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"
                            />
                            <path
                              fill-rule="evenodd"
                              d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"
                            />
                          </svg>
                          Notes
                        </a>
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          id="message-tab"
                          data-toggle="pill"
                          href="#message"
                          role="tab"
                          aria-controls="message"
                          aria-selected="false"
                        >
                          <svg
                            width="1em"
                            height="1em"
                            viewBox="0 0 16 16"
                            class="bi bi-clock-notes"
                            fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"
                            />
                            <path
                              fill-rule="evenodd"
                              d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"
                            />
                            <path
                              fill-rule="evenodd"
                              d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"
                            />
                          </svg>
                          Message
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-xl-12">
              <div class="tab-content" id="pills-tabContent">
                <div
                  class="tab-pane fade show active"
                  id="detail"
                  role="tabpanel"
                  aria-labelledby="detail-tab"
                >
                  <div class="card card-custom gutter-b bg-white border-0">
                    <div class="card-header border-bottom align-items-center">
                      <div class="col-xl-2 col-12">
                        <div class="card-title mb-2">
                          <h3
                            class="card-label mb-0 font-weight-bold text-body"
                          >
                            Customer
                          </h3>
                        </div>
                      </div>
                      <div class="col-xl-8 col-12">
                        <div class="user-info mb-2">
                          <ul
                            class="
                              m-0
                              p-0
                              list-style-none
                              d-flex
                              justify-content-center
                            "
                          >
                            <li class="d-flex mr-3 align-items-center">
                              <span class="text-body icon">
                                <svg
                                  width="15px"
                                  height="15px"
                                  viewBox="0 0 16 16"
                                  class="bi bi-person"
                                  fill="currentColor"
                                  xmlns="http://www.w3.org/2000/svg"
                                >
                                  <path
                                    fill-rule="evenodd"
                                    d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"
                                  />
                                </svg>
                              </span>
                              <h5
                                class="
                                  font-size-h4 font-size-bold
                                  text-body
                                  mb-0
                                  pl-2
                                  pr-2
                                "
                              >
                                Name:
                                <span class="text-dark font-size-base">{{
                                  orders.customer_id.customer_first_name +
                                  " " +
                                  orders.customer_id.customer_last_name
                                }}</span>
                              </h5>
                            </li>

                            <li class="d-flex align-items-center">
                              <span class="text-body icon">
                                <svg
                                  width="15px"
                                  height="15px"
                                  viewBox="0 0 16 16"
                                  class="bi bi-envelope"
                                  fill="currentColor"
                                  xmlns="http://www.w3.org/2000/svg"
                                >
                                  <path
                                    fill-rule="evenodd"
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"
                                  />
                                </svg>
                              </span>
                              <h5
                                class="
                                  font-size-h4 font-size-bold
                                  text-body
                                  mb-0
                                  pl-2
                                  pr-2
                                "
                              >
                                Email:
                                <span class="text-dark font-size-base">{{
                                  orders.customer_id.customer_email
                                }}</span>
                              </h5>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div id="third" class="col-xl-2 col-12">
                        <div class="text-black-50 text-right">
                          <h5 class="font-size-h6 mb-0">
                            Placed On <span>{{ orders.order_date }}</span>
                          </h5>
                        </div>
                      </div>
                    </div>

                    <div class="card-body pt-0">
                      <div
                        class="
                          row
                          gutter-pb gutter-pt
                          border-bottom
                          order-payment
                          justify-content-center
                        "
                      >
                        <div class="col-12 col-lg-6 col-xl-4 payment-detail">
                          <h4
                            class="
                              card-label
                              mb-2
                              font-weight-bold font-size-h4
                              text-body
                            "
                          >
                            Payment Method
                          </h4>
                          <input
                            type="text"
                            class="form-control w-250px"
                            id="disabledInput1"
                            :placeholder="orders.payment_method"
                            disabled=""
                          />
                          <h5
                            class="
                              font-size-h5
                              mt-3
                              mb-0
                              font-size-bold
                              text-body
                            "
                          >
                            Transaction ID:
                            <span class="text-dark font-size-base">{{
                              orders.transaction_id
                                ? orders.transaction_id
                                : "none"
                            }}</span>
                          </h5>
                          <h5
                            class="
                              font-size-h5
                              mt-3
                              mb-0
                              font-size-bold
                              text-body
                            "
                          >
                            Amount:
                            <span class="text-dark font-size-base">{{
                              orders.order_price
                            }}</span>
                          </h5>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4 payment-detail">
                          <h4
                            class="
                              card-label
                              mb-2
                              font-weight-bold font-size-h4
                              text-body
                            "
                          >
                            Shipping Method
                          </h4>
                          <input
                            type="text"
                            class="form-control w-250px"
                            id="disabledInput"
                            :placeholder="orders.shipping_method"
                            disabled=""
                          />
                          <!-- <h5
                            class="
                              font-size-h5
                              mt-3
                              mb-0
                              font-size-bold
                              text-body
                            "
                          >
                            Tracking Code:
                            <span class="text-dark font-size-base"
                              >FX-0123456</span
                            >
                          </h5> -->
                          <h5
                            class="
                              font-size-h5
                              mt-3
                              mb-0
                              font-size-bold
                              text-body
                            "
                          >
                            Date:
                            <span class="text-dark font-size-base"
                              >{{orders.order_date}}</span
                            >
                          </h5>
                        </div>
                      </div>
                      <div
                        class="
                          row
                          gutter-pb gutter-pt
                          justify-content-center
                          border-bottom
                        "
                      >
                        <div class="col-12 col-lg-6 col-xl-4 payment-detail">
                          <h4
                            class="
                              card-label
                              mb-2
                              font-weight-bold font-size-h4
                              text-body
                            "
                          >
                            Billing Address
                          </h4>
                          <h5
                            class="
                              font-size-h5
                              mt-3
                              mb-0
                              font-size-bold
                              text-body
                            "
                          >
                            First Name:
                            <span class="text-dark">{{
                              orders.billing_first_name
                            }}</span>
                          </h5>
                          <h5
                            class="
                              font-size-h5
                              mt-3
                              mb-0
                              font-size-bold
                              text-body
                            "
                          >
                            Last Name:
                            <span class="text-dark font-size-base">{{
                              orders.billing_last_name
                            }}</span>
                          </h5>
                          <h5
                            class="
                              font-size-h5
                              mt-3
                              mb-0
                              font-size-bold
                              text-body
                            "
                          >
                            Address:
                            <span class="text-dark font-size-base">{{
                              orders.billing_street_aadress
                            }}</span>
                          </h5>
                          <h5
                            class="
                              font-size-h5
                              mt-3
                              mb-0
                              font-size-bold
                              text-body
                            "
                          >
                            City:
                            <span class="text-dark font-size-base">{{
                              orders.billing_city
                            }}</span>
                          </h5>
                          <h5
                            class="
                              font-size-h5
                              mt-3
                              mb-0
                              font-size-bold
                              text-body
                            "
                          >
                            Country:
                            <span class="text-dark font-size-base">{{
                              orders.billing_country1.country_name
                            }}</span>
                          </h5>
                          <h5
                            class="
                              font-size-h5
                              mt-3
                              mb-0
                              font-size-bold
                              text-body
                            "
                          >
                            State:
                            <span class="text-dark font-size-base">{{
                              orders.billing_state1.name
                            }}</span>
                          </h5>
                          <h5
                            class="
                              font-size-h5
                              mt-3
                              mb-0
                              font-size-bold
                              text-body
                            "
                          >
                            Zip Code:
                            <span class="text-dark font-size-base">{{
                              orders.billing_postcode
                            }}</span>
                          </h5>
                          <h5
                            class="
                              font-size-h5
                              mt-5
                              mb-0
                              font-size-bold
                              text-body
                            "
                          >
                            Phone:
                            <span class="text-dark font-size-base">{{
                              orders.billing_phone
                            }}</span>
                          </h5>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-4 payment-detail">
                          <h4
                            class="
                              card-label
                              mb-2
                              font-weight-bold font-size-h4
                              text-body
                            "
                          >
                            Shipping Address
                          </h4>
                          <h5
                            class="
                              font-size-h5
                              mt-3
                              mb-0
                              font-size-bold
                              text-body
                            "
                          >
                            First Name:
                            <span class="text-dark font-size-base">{{
                              orders.delivery_first_name
                            }}</span>
                          </h5>
                          <h5
                            class="
                              font-size-h5
                              mt-3
                              mb-0
                              font-size-bold
                              text-body
                            "
                          >
                            Last Name:
                            <span class="text-dark font-size-base">{{
                              orders.delivery_last_name
                            }}</span>
                          </h5>
                          <h5
                            class="
                              font-size-h5
                              mt-3
                              mb-0
                              font-size-bold
                              text-body
                            "
                          >
                            Address:
                            <span class="text-dark font-size-base">{{
                              orders.delivery_street_aadress
                            }}</span>
                          </h5>
                          <h5
                            class="
                              font-size-h5
                              mt-3
                              mb-0
                              font-size-bold
                              text-body
                            "
                          >
                            City:
                            <span class="text-dark font-size-base">{{
                              orders.delivery_city
                            }}</span>
                          </h5>
                          <h5
                            class="
                              font-size-h5
                              mt-3
                              mb-0
                              font-size-bold
                              text-body
                            "
                          >
                            Country:
                            <span class="text-dark font-size-base">{{
                              orders.delivery_country1.country_name
                            }}</span>
                          </h5>
                          <h5
                            class="
                              font-size-h5
                              mt-3
                              mb-0
                              font-size-bold
                              text-body
                            "
                          >
                            State:
                            <span class="text-dark font-size-base">{{
                              orders.delivery_state1.name
                            }}</span>
                          </h5>
                          <h5
                            class="
                              font-size-h5
                              mt-3
                              mb-0
                              font-size-bold
                              text-body
                            "
                          >
                            Zip Code:
                            <span class="text-dark font-size-base">{{
                              orders.delivery_postcode
                            }}</span>
                          </h5>
                          <h5
                            class="
                              font-size-h5
                              mt-5
                              mb-0
                              font-size-bold
                              text-body
                            "
                          >
                            Phone:
                            <span class="text-dark font-size-base">{{
                              orders.delivery_phone
                            }}</span>
                          </h5>
                        </div>
                      </div>
                      <div class="row">
                        <div
                          class="col-12 gutter-pt table-padding"
                          id="printableTable"
                        >
                          <table class="table table-striped text-body">
                            <thead>
                              <tr class="d-flex">
                                <th class="col-2"></th>
                                <th class="col-3">ITEM"S</th>
                                <th class="col-3">PRICE</th>
                                <th class="col-2">QTY</th>
                                <th class="col-2">SUBTOTAL</th>
                              </tr>
                            </thead>
                            <tbody id="order-show-detail">
                              <tr
                                class="d-flex responsive-lay"
                                v-for="detail in orders.order_detail"
                                v-if="detail.product.product_type == 'variable'"
                              >
                                <td class="col-12 col-md-2">
                                  <img
                                    class="img-fluid order-image"
                                    :src="
                                      '/gallary/' +
                                      detail.product_combination.gallary
                                        .gallary_name
                                    "
                                    :alt="
                                      '/gallary/' +
                                      detail.product_combination.gallary
                                        .gallary_name
                                    "
                                    style="width: 50px; height: 60px"
                                  />
                                </td>
                                <td class="col-12 col-md-3 item-detail-left">
                                  <div class="text-body">
                                    <h4 class="order-product-name">
                                      {{ detail.product.detail[0].title }}
                                      <span
                                        v-for="variation in detail
                                          .product_combination.combination"
                                      >
                                        {{ variation.variation.detail[0].name }}
                                      </span>
                                    </h4>
                                  </div>
                                </td>
                                <td
                                  class="tag-color col-12 col-md-3 order-price"
                                >
                                  {{ detail.product_discount ?  detail.product_discount  : detail.product_price }}
                                </td>
                                <td class="col-12 col-md-2">
                                  <div class="input-group">
                                    {{ detail.product_qty }}
                                  </div>
                                </td>
                                <td
                                  class="tag-s col-12 col-md-2 order-sub-price"
                                >
                                  {{ detail.product_discount ?  detail.product_discount * detail.product_qty : detail.product_price * detail.product_qty  }}
                                </td>
                              </tr>

                              <tr
                                class="d-flex responsive-lay"
                                v-for="detail in orders.order_detail"
                                v-if="detail.product.product_type == 'simple'"
                              >
                                <td class="col-12 col-md-2">
                                  <img
                                    class="img-fluid order-image"
                                    :src="
                                      '/gallary/' +
                                      detail.product.product_gallary
                                        .gallary_name
                                    "
                                    :alt="
                                      '/gallary/' +
                                      detail.product.product_gallary
                                        .gallary_name
                                    "
                                    style="width: 50px; height: 60px"
                                  />
                                </td>
                                <td class="col-12 col-md-3 item-detail-left">
                                  <div class="text-body">
                                    <h4 class="order-product-name">
                                      {{ detail.product.detail[0].title }}
                                    </h4>
                                  </div>
                                </td>
                                <td
                                  class="tag-color col-12 col-md-3 order-price"
                                >
                                  {{ detail.product_discount ?  detail.product_discount : detail.product_price}}
                                </td>
                                <td class="col-12 col-md-2">
                                  <div class="input-group">
                                    {{ detail.product_qty }}
                                  </div>
                                </td>
                                <td
                                  class="tag-s col-12 col-md-2 order-sub-price"
                                >
                                  {{ detail.product_discount ?  detail.product_discount * detail.product_qty : detail.product_price * detail.product_qty  }}
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <div class="row justify-content-end">
                            <div class="col-12 col-md-3">
                              <div>
                                <table class="table right-table">
                                  <tbody>
                                    <tr
                                      class="
                                        d-flex
                                        align-items-center
                                        justify-content-between
                                      "
                                    >
                                      <th
                                        class="
                                          border-0
                                          font-size-h5
                                          mb-0
                                          font-size-bold
                                          text-dark
                                        "
                                      >
                                        SUBTOTAL
                                      </th>
                                      <td
                                        class="
                                          border-0
                                          justify-content-end
                                          d-flex
                                          text-black-50
                                          font-size-base
                                        "
                                      >
                                        {{ subtotal }}
                                      </td>
                                    </tr>
                                    <tr
                                      class="
                                        d-flex
                                        align-items-center
                                        justify-content-between
                                      "
                                    >
                                      <th
                                        class="
                                          border-0
                                          font-size-h5
                                          mb-0
                                          font-size-bold
                                          text-dark
                                        "
                                      >
                                        TAX
                                      </th>
                                      <td
                                        class="
                                          border-0
                                          justify-content-end
                                          d-flex
                                          text-black-50
                                          font-size-base
                                        "
                                      >
                                        {{ tax_total }}
                                      </td>
                                    </tr>
                                    <tr
                                      class="
                                        d-flex
                                        align-items-center
                                        justify-content-between
                                      "
                                    >
                                      <th
                                        class="
                                          border-0
                                          font-size-h5
                                          mb-0
                                          font-size-bold
                                          text-dark
                                        "
                                      >
                                        DISCOUNT
                                      </th>
                                      <td
                                        class="
                                          border-0
                                          justify-content-end
                                          d-flex
                                          text-black-50
                                          font-size-base
                                        "
                                      >
                                        {{ discountTotal }}
                                      </td>
                                    </tr>
                                    <tr
                                      class="
                                        d-flex
                                        align-items-center
                                        justify-content-between
                                        item-price
                                      "
                                    >
                                      <th
                                        class="
                                          border-0
                                          font-size-h5
                                          mb-0
                                          font-size-bold
                                          text-dark
                                        "
                                      >
                                        TOTAL
                                      </th>
                                      <td
                                        class="
                                          border-0
                                          justify-content-end
                                          d-flex
                                          text-dark
                                          font-size-base
                                        "
                                      >
                                        {{ total }}
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  class="tab-pane fade"
                  id="invoice"
                  role="tabpanel"
                  aria-labelledby="invoice-tab"
                >
                  <div class="card card-custom gutter-b bg-white border-0">
                    <div
                      class="
                        card-header
                        d-flex
                        align-items-start
                        justify-content-between
                        border-0
                        pb-5
                      "
                    >
                      <div class="card-title mb-0 d-flex inovice-main">
                        <div
                          class="
                            bg-primary
                            pb-3
                            h-150px
                            w-150px
                            d-flex
                            flex-column
                            justify-content-end
                            align-items-center
                          "
                        >
                          <h3 class="font-size-h3 text-white">Invoice</h3>
                          <h4 class="font-size-h4 text-white">
                            {{ orders.order_id }}
                          </h4>
                        </div>
                        <div class="card-user-detail padding-top pl-3 w-250px">
                          <h5 class="font-size-h5 font-size-bold text-body">
                            {{ this.$parent.globalSettings.site_name }}
                          </h5>
                          <h5 class="font-size-h5 text-dark">
                            {{ orders.delivery_street_aadress }}
                          </h5>
                          <h5 class="font-size-h5 text-dark">
                            {{ orders.customer_id.delivery_phone }}
                          </h5>
                          <h5 class="font-size-h5 text-dark">
                            {{ orders.customer_id.customer_email }}
                          </h5>
                        </div>
                      </div>

                      <div class="padding-top">
                        <h5 class="font-size-h5 text-black-50">
                          Placed On <span>{{ orders.order_date }}</span>
                        </h5>
                        <a href="#">
                          <img :src="this.$parent.globalSettings.site_logo" alt="logo" />
                        </a>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12 table-padding">
                          <table class="table table-striped text-body">
                            <thead>
                              <tr class="d-flex">
                                <th class="col-2"></th>
                                <th class="col-3">ITEM"S</th>
                                <th class="col-3">PRICE</th>
                                <th class="col-2">QTY</th>
                                <th class="col-2">SUBTOTAL</th>
                              </tr>
                            </thead>
                            <tbody id="order-show-detail">
                              <tr
                                class="d-flex responsive-lay"
                                v-for="detail in orders.order_detail"
                                v-if="detail.product.product_type == 'variable'"
                              >
                                <td class="col-12 col-md-2">
                                  <img
                                    class="img-fluid order-image"
                                    :src="
                                      '/gallary/' +
                                      detail.product_combination.gallary
                                        .gallary_name
                                    "
                                    :alt="
                                      '/gallary/' +
                                      detail.product_combination.gallary
                                        .gallary_name
                                    "
                                    style="width: 50px; height: 60px"
                                  />
                                </td>
                                <td class="col-12 col-md-3 item-detail-left">
                                  <div class="text-body">
                                    <h4 class="order-product-name">
                                      {{ detail.product.detail[0].title }}
                                      <span
                                        v-for="variation in detail
                                          .product_combination.combination"
                                      >
                                        {{ variation.variation.detail[0].name }}
                                      </span>
                                    </h4>
                                  </div>
                                </td>
                                <td
                                  class="tag-color col-12 col-md-3 order-price"
                                >
                                  {{ detail.product_discount ? detail.product_discount : detail.product_price }}}
                                </td>
                                <td class="col-12 col-md-2">
                                  <div class="input-group">
                                    {{ detail.product_qty }}
                                  </div>
                                </td>
                                <td
                                  class="tag-s col-12 col-md-2 order-sub-price"
                                >
                                 {{ detail.product_discount ?  detail.product_discount * detail.product_qty : detail.product_price * detail.product_qty }}
                                </td>
                              </tr>

                              <tr
                                class="d-flex responsive-lay"
                                v-for="detail in orders.order_detail"
                                v-if="detail.product.product_type == 'simple'"
                              >
                                <td class="col-12 col-md-2">
                                  <img
                                    class="img-fluid order-image"
                                    :src="
                                      '/gallary/' +
                                      detail.product.product_gallary
                                        .gallary_name
                                    "
                                    :alt="
                                      '/gallary/' +
                                      detail.product.product_gallary
                                        .gallary_name
                                    "
                                    style="width: 50px; height: 60px"
                                  />
                                </td>
                                <td class="col-12 col-md-3 item-detail-left">
                                  <div class="text-body">
                                    <h4 class="order-product-name">
                                      {{ detail.product.detail[0].title }}
                                    </h4>
                                  </div>
                                </td>
                                <td
                                  class="tag-color col-12 col-md-3 order-price"
                                >
                                  {{ detail.product_discount ? detail.product_discount : detail.product_price }}
                                </td>
                                <td class="col-12 col-md-2">
                                  <div class="input-group">
                                    {{ detail.product_qty }}
                                  </div>
                                </td>
                                <td
                                  class="tag-s col-12 col-md-2 order-sub-price"
                                >
                                  {{ detail.product_discount ?  detail.product_discount * detail.product_qty : detail.product_price * detail.product_qty }}
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <div class="row justify-content-end">
                            <div class="col-12 col-md-3">
                              <div>
                                <table class="table right-table">
                                  <tbody>
                                    <tr
                                      class="
                                        d-flex
                                        align-items-center
                                        justify-content-between
                                      "
                                    >
                                      <th
                                        class="
                                          border-0
                                          font-size-h5
                                          mb-0
                                          font-size-bold
                                          text-dark
                                        "
                                      >
                                        SUBTOTAL
                                      </th>
                                      <td
                                        class="
                                          border-0
                                          justify-content-end
                                          d-flex
                                          text-black-50
                                          font-size-base
                                        "
                                      >
                                        {{ subtotal }}
                                      </td>
                                    </tr>
                                    <tr
                                      class="
                                        d-flex
                                        align-items-center
                                        justify-content-between
                                      "
                                    >
                                      <th
                                        class="
                                          border-0
                                          font-size-h5
                                          mb-0
                                          font-size-bold
                                          text-dark
                                        "
                                      >
                                        TAX
                                      </th>
                                      <td
                                        class="
                                          border-0
                                          justify-content-end
                                          d-flex
                                          text-black-50
                                          font-size-base
                                        "
                                      >
                                        {{ tax_total }}
                                      </td>
                                    </tr>
                                    <tr
                                      class="
                                        d-flex
                                        align-items-center
                                        justify-content-between
                                      "
                                    >
                                      <th
                                        class="
                                          border-0
                                          font-size-h5
                                          mb-0
                                          font-size-bold
                                          text-dark
                                        "
                                      >
                                        DISCOUNT
                                      </th>
                                      <td
                                        class="
                                          border-0
                                          justify-content-end
                                          d-flex
                                          text-black-50
                                          font-size-base
                                        "
                                      >
                                        {{ discountTotal }}
                                      </td>
                                    </tr>
                                    <tr
                                      class="
                                        d-flex
                                        align-items-center
                                        justify-content-between
                                        item-price
                                      "
                                    >
                                      <th
                                        class="
                                          border-0
                                          font-size-h5
                                          mb-0
                                          font-size-bold
                                          text-dark
                                        "
                                      >
                                        TOTAL
                                      </th>
                                      <td
                                        class="
                                          border-0
                                          justify-content-end
                                          d-flex
                                          text-dark
                                          font-size-base
                                        "
                                      >
                                        {{ total }}
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  class="tab-pane fade status-tab-style"
                  id="status"
                  role="tabpanel"
                  aria-labelledby="status-tab"
                >
                  <div class="card card-custom gutter-b bg-white border-0">
                    <div class="card-body">
                      <div class="row gutter-b">
                        <div class="col-12 table-padding">
                          <table class="table table-striped text-body">
                            <thead>
                              <tr class="row">
                                <th
                                  class="text-center border-0 col-6"
                                  scope="col"
                                >
                                  DATE ADDED
                                </th>
                                <th
                                  class="text-center border-0 col-6"
                                  scope="col"
                                >
                                  STATUS
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr class="row" v-for="history in orders.order_history">
                                <td class="text-center col-6">
                                  {{history.created_at}}
                                </td>
                                <td class="text-center col-6">
                                  {{history.order_status}}
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <div
                            class="
                              form-group
                              row
                              align-items-center
                              justify-content-center
                            "
                          >
                            <div class="col-xl-6 col-lg-8 col-12 status-detail">
                              <label class="col-form-label mr-3"
                                >Order Status</label
                              >
                              <fieldset class="form-group">
                                <select
                              
                                  class="form-control"
                                  v-model="order_status"
                                  v-if="order_status == 'Pending'"
                                >
                                  <option
                                    value="Pending"
                                    :selected="
                                      order_status == 'Pending'
                                        ? 'selected'
                                        : ''
                                    "
                                  >
                                  
                                    Pending
                                  </option>

                                  <option
                                    value="Inprocess"
                                    :selected="
                                      order_status == 'Inprocess'
                                        ? 'selected'
                                        : ''
                                    "
                                  >
                                  
                                    In Process
                                  </option>

                                  <option
                                    value="Dispatched"
                                    :selected="
                                      order_status == 'Dispatched'
                                        ? 'selected'
                                        : ''
                                    "
                                  >
                                  
                                    Dispatched
                                  </option>
                                  <option
                                    value="Complete"
                                    :selected="
                                      order_status == 'Complete'
                                        ? 'selected'
                                        : ''
                                    "
                                  >
                                    Complete
                                  </option>
                                  <option
                                    value="Return"
                                    :selected="
                                      order_status == 'Return' ? 'selected' : ''
                                    "
                                  >
                                    Return
                                  </option>
                                  <option
                                    value="Cancel"
                                    :selected="
                                      order_status == 'Cancel' ? 'selected' : ''
                                    "
                                  >
                                    Cancel
                                  </option>
                                </select>


                                <select
                              
                                  class="form-control"
                                  v-model="order_status"
                                  v-if="order_status == 'Inprocess'"
                                >
                                  <option
                                    value="Inprocess"
                                    :selected="
                                      order_status == 'Inprocess'
                                        ? 'selected'
                                        : ''
                                    "
                                  >
                                  
                                    In Process
                                  </option>

                                  <option
                                    value="Dispatched"
                                    :selected="
                                      order_status == 'Dispatched'
                                        ? 'selected'
                                        : ''
                                    "
                                  >
                                  
                                    Dispatched
                                  </option>
                                  <option
                                    value="Complete"
                                    :selected="
                                      order_status == 'Complete'
                                        ? 'selected'
                                        : ''
                                    "
                                  >
                                    Complete
                                  </option>
                                  <option
                                    value="Return"
                                    :selected="
                                      order_status == 'Return' ? 'selected' : ''
                                    "
                                  >
                                    Return
                                  </option>
                                  <option
                                    value="Cancel"
                                    :selected="
                                      order_status == 'Cancel' ? 'selected' : ''
                                    "
                                  >
                                    Cancel
                                  </option>
                                </select>

                                <select
                              
                                  class="form-control"
                                  v-model="order_status"
                                  v-if="order_status == 'Dispatched'"
                                >

                                  <option
                                    value="Dispatched"
                                    :selected="
                                      order_status == 'Dispatched'
                                        ? 'selected'
                                        : ''
                                    "
                                  >
                                  
                                    Dispatched
                                  </option>
                                  <option
                                    value="Complete"
                                    :selected="
                                      order_status == 'Complete'
                                        ? 'selected'
                                        : ''
                                    "
                                  >
                                    Complete
                                  </option>
                                  <option
                                    value="Return"
                                    :selected="
                                      order_status == 'Return' ? 'selected' : ''
                                    "
                                  >
                                    Return
                                  </option>
                                  <option
                                    value="Cancel"
                                    :selected="
                                      order_status == 'Cancel' ? 'selected' : ''
                                    "
                                  >
                                    Cancel
                                  </option>
                                </select>

                                <select
                                  
                                  class="form-control"
                                  v-model="order_status"
                                  v-if="order_status == 'Complete'"
                                >
                                  <option
                                    value="Complete"
                                    :selected="
                                      order_status == 'Complete'
                                        ? 'selected'
                                        : ''
                                    "
                                  >
                                    Complete
                                  </option>
                                  <option
                                    value="Return"
                                    :selected="
                                      order_status == 'Return' ? 'selected' : ''
                                    "
                                  >
                                    Return
                                  </option>
                                </select>

                                <select
                                  
                                  class="form-control"
                                  v-model="order_status"
                                  v-if="order_status == 'Cancel'"
                                >
                                  <option
                                    value="Complete"
                                    :selected="
                                      order_status == 'Cancel' ? 'selected' : ''
                                    "
                                  >
                                    Cancel
                                  </option>
                                </select>

                                <select
                                  
                                  class="form-control"
                                  v-model="order_status"
                                  v-if="order_status == 'Return'"
                                >
                                  <option
                                    value="Return"
                                    :selected="
                                      order_status == 'Return' ? 'selected' : ''
                                    "
                                  >
                                    Return
                                  </option>
                                </select>
                                <br />

                          <button class="btn btn-primary" style="float:right" @click="statusUpdate()">Submit</button>
                              </fieldset>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  class="tab-pane fade"
                  id="delivery"
                  role="tabpanel"
                  aria-labelledby="delivery-tab"
                  v-if="setting.is_deliveryboyapp_purchased === '1'"
                >
                  <div class="row">
                    <div class="col-lg-12 col-12">
                       <div class="card card-custom gutter-b bg-white border-0">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12">
                          <div
                            class="
                              form-group
                              row
                              align-items-center
                              justify-content-center
                            "
                          >
                            <div class="col-xl-6 col-lg-8 col-12 status-detail">
                              <label class="col-form-label mr-3"
                                >Assign Order To Delivery Boy</label
                              >
                              <fieldset class="form-group">
                               
                                <select
                                  
                                  class="form-control"
                                  v-model="delivery_boy_id"
                                >
                                  <option
                                    v-for="db in deliveryboys"
                                    :selected = "orders.delivery_boy_id == db.id"
                                    :value="db.id"
                                  >
                                    {{ db.first_name }} {{ db.last_name }}
                                  </option>
                                </select>
                                <br />

                              <button class="btn btn-primary" style="float:right" @click="assignDeliveryBoy()">Submit</button>
                              </fieldset>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                    </div>
                  </div>
                </div>
                <div
                  class="tab-pane fade"
                  id="notes"
                  role="tabpanel"
                  aria-labelledby="notes-tab"
                >
                  <div class="card card-custom gutter-b bg-white border-0">
                    <div class="card-body">
                      <div id="draggable-cards" class="gutter-t">
                        <div class="row" id="card-drag-area">
                          <div class="col-lg-6 col-xl-4" v-for="note in orders.order_notes">
                            <div
                              id="02"
                              class="
                                card card-custom
                                gutter-b
                                bg-white
                                border-0
                                pincard
                              "
                            >
                              <div
                                class="card-header align-items-center border-0"
                              >
                                <div class="card-title mb-0">
                                  <h5 class="font-size-h5 text-black-50">
                                    {{ note.created_at }}
                                  </h5>
                                </div>

                                <div class="pin-click" id="pin2">
                                  <!-- <i
                                    class="
                                      fas
                                      fa-eye-slash
                                      pin-fixnot
                                      dis-block
                                    "
                                  ></i>
                                  <i class="fas fa-eye pin dis-none"></i> -->
                                </div>
                              </div>
                              <div class="card-body">
                                <div class="card-title mb-0">
                                  <h3 class="font-size-h3 text-body">
                                    {{ note.title }}
                                  </h3>
                                </div>
                                <div class="card-detail text-dark">
                                  <p>
                                   {{ note.notes }}

                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-xl-4">
                            <div
                              class="
                                border-dashed
                                addnote
                                pincard
                                d-flex
                                justify-content-center
                                align-items-center
                              "
                            >
                              <div class="card-toolbar" @click="display_form = !display_form">
                                <div
                                  class="
                                    btn btn-icon btn-secondary btn-plus
                                    h-100px
                                    w-100px
                                  "
                                  id="kt_notes_panel_toggle"
                                  data-toggle="tooltip"
                                  title=""
                                  data-placement="right"
                                  data-original-title="Check out more demos"
                                >
                                  <span
                                    class="
                                      svg-icon svg-icon-xl svg-icon-primary
                                      white
                                    "
                                  >
                                    <svg
                                      width=""
                                      height=""
                                      viewBox="0 0 16 16"
                                      class="bi bi-plus"
                                      fill="currentColor"
                                      xmlns="http://www.w3.org/2000/svg"
                                    >
                                      <path
                                        fill-rule="evenodd"
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"
                                      ></path>
                                    </svg>
                                  </span>
                                  <h5 class="mt-3 text-dark font-size-h5">
                                    Add Notes
                                  </h5>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <div
                  class="tab-pane fade"
                  id="message"
                  role="tabpanel"
                  aria-labelledby="message-tab"
                >
                  <div class="row">
                    <div class="col-12">
                      <div
                        class="
                          card card-custom
                          gutter-b
                          bg-white
                          border-0
                          message-content
                          p-5
                        "
                      >
                        <div class="row justify-content-center">
                          <div class="col-12 col-md-8">
                            <div
                              class="
                                d-flex
                                align-items-center
                                border-0
                                p-3
                                rounded
                                mb-5
                              "
                              v-for="comment in orders.order_comments"
                            >
                              <div class="media">
                               
                                <div class="media-body ml-3" v-if="comment.customer != null">
                                  <div
                                    class="d-flex justify-content-between mb-1"
                                  >
                                    <h3 class="font-size-h3 text-dark info-tag">
                                      {{ comment.customer.customer_first_name }} {{ comment.customer.customer_last_name }}
                                    </h3>
                                  </div>
                                  <div
                                    class="
                                      badge badge-primary
                                      font-size-h5
                                      rounded
                                    "
                                  >
                                    Customer
                                  </div>
                                </div>
                                <div class="media-body ml-3" v-if="comment.user != null">
                                  <div
                                    class="d-flex justify-content-between mb-1"
                                  >
                                    <h3 class="font-size-h3 text-dark info-tag">
                                      {{ comment.user.name }}
                                    </h3>
                                  </div>
                                  <div
                                    class="
                                      badge badge-primary
                                      font-size-h5
                                      rounded
                                    "
                                  >
                                  {{ comment.user.role.name }}

                                  </div>
                                </div>
                              </div>
                              <div
                                class="text-input position-relative disabled"
                              >
                                <div class="date-text">
                                  <h5
                                    class="
                                      font-size-h5
                                      text-black-50 text-right
                                    "
                                  >
                                    {{ comment.created_at }} 
                                  </h5>
                                </div>
                                <fieldset class="form-label-group">
                                  <textarea
                                    class="form-control fixed-size"
                                    id="horizontalTextarea1"
                                    rows="6"
                                    :placeholder="comment.message"
                                    disabled
                                  ></textarea>
                                </fieldset>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row justify-content-center">
                          <div class="col-12 col-md-8">
                            <div
                              class="
                                card-header
                                align-items-end
                                border-0
                                rounded
                                position-relative
                              "
                            >
                              <fieldset class="form-label-group w-100">
                                <textarea
                                  id="txtarea"
                                  class="
                                    bg-light
                                    autoexpand-textarea
                                    form-control
                                  "
                                  placeholder=" Enter Text.."
                                  v-model="message"
                                ></textarea>
                                <small class="form-text text-danger" v-if="errors.has('message')" v-text="errors.get('message')"></small>

                                
                              </fieldset>
                              <div class="addclip-input pr-3 pb-2">
                                <button class="btn btn-primary" @click="saveComments()">Send</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="kt_notes_panel" class="offcanvas offcanvas-right kt-color-panel p-5 offcanvas-on" v-if="display_form == 1">
		<div class="offcanvas-header d-flex align-items-center justify-content-between pb-3">
			<h4 class="font-size-h4 font-weight-bold m-0">Add Note
			</h4>
			<a href="#" class="btn btn-sm btn-icon btn-light btn-hover-primary" id="kt_notes_panel_close" @click="display_form = !display_form">
				<svg width="20px" height="20px" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"></path>
				</svg>
			</a>
		</div>
		<form id="myform" novalidate="novalidate">
			<div class="form-group">
			  <label class="text-dark" for="exampleInputText1">Title of a Note</label>
			  <input type="text" name="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp" v-model="notes_title">
			  <small class="form-text text-danger" v-if="errors.has('title')" v-text="errors.get('title')"></small>

			</div>
			<div class="form-group">
			  <label class="text-dark">Note</label>
			  <textarea class="form-control" id="label-textarea2" rows="6" placeholder="Write A Text" v-model="notes"></textarea>
        <small class="form-text text-danger" v-if="errors.has('notes')" v-text="errors.get('notes')"></small>

			</div>
			<button type="button" class="btn btn-primary" @click="saveNotes()">Add Note</button>
		  </form>
	</div>
  </div>
</template>
<script>
import ErrorHandling from "../../ErrorHandling";
export default {
  data() {
    return {
      display_form: 0,
      orders: [],
      searchParameter: "",
      sortBy: "id",
      sortType: "ASC",
      limit: 10,
      message:'',
      error_message: "",
      edit: false,
      actions: false,
      pagination: {},
      request_method: "",
      is_default: "0",
      order_status: "",
      token: [],
      subtotal: 0,
      tax_total: 0,
      discountTotal: 0,
      total: 0,
      notes_title:"",
      notes:"",
      delivery_boy_id:"",
      setting: {},
      deliveryboys:[],
      errors: new ErrorHandling(),
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },

  methods: {
    fetchorders(page_url) {
      this.$parent.loading = true;
      let vm = this;
      page_url =
        page_url ||
        "/api/admin/order/" +
          this.$route.params.id +
          "?orderDetail=1&productDetail=1&currency=1&billing_country=1&billing_state=1&delivery_country=1&delivery_state=1&customer=1";

      axios
        .get(page_url, this.token)
        .then((res) => {
          this.orders = res.data.data;
            this.order_status = this.orders.order_status;
            this.delivery_boy_id = this.orders.delivery_boy_id;
            this.tax_total = this.orders.total_tax;
          for (var i = 0; i < this.orders.order_detail.length; i++) {
            // this.discountTotal = this.discountTotal + this.orders.order_detail[i].product_discount;
            this.subtotal =this.orders.order_detail[i].product_discount ? this.subtotal + this.orders.order_detail[i].product_discount*this.orders.order_detail[i].product_qty : this.subtotal + this.orders.order_detail[i].product_price*this.orders.order_detail[i].product_qty;
          }
          this.total = this.subtotal + this.tax_total - this.discountTotal;
        })
        .finally(() => (this.$parent.loading = false));
    },
    statusUpdate() {
      this.$parent.loading = true;
      let vm = this;
      var page_url = "/api/admin/order/" + this.$route.params.id;

      axios
        .put(page_url, { order_status: this.order_status }, this.token)
        .then((res) => {
          this.fetchorders();
          this.$toaster.success("Order status updated");
        })
        .finally(() => (this.$parent.loading = false));
    },
    assignDeliveryBoy(){
      this.$parent.loading = true;
      let vm = this;
      var page_url = "/api/admin/order/" + this.$route.params.id;

      axios
        .put(page_url, { order_status:this.order_status,delivery_boy_id: this.delivery_boy_id }, this.token)
        .then((res) => {
          this.fetchorders();
          this.$toaster.success("Delivery Boy Assigned");
        })
        .finally(() => (this.$parent.loading = false));
    },
    saveNotes() {
      this.$parent.loading = true;
      let vm = this;
      var page_url = "/api/admin/add_notes";
      let data = {
        notes:this.notes,
        title:this.notes_title,
        id:this.$route.params.id
      }
      axios
        .post(page_url, data, this.token)
        .then((res) => {
          this.fetchorders();
          this.$toaster.success("Order Note added");
          this.notes_title = '';
          this.notes = '';
          this.display_form = 0;
        })
        .catch(error => {
					this.error_message = '';
					this.errors = new ErrorHandling();
					if (error.response.status == 422) {
						if(error.response.data.status == 'Error'){
							this.error_message = error.response.data.message;
						}
						else{
							this.errors.record(error.response.data.errors);
						}
					}
				})
        .finally(() => (this.$parent.loading = false));
    },
    saveComments() {
      this.$parent.loading = true;
      let vm = this;
      var page_url = "/api/admin/add_comments";
      let data = {
        message:this.message,
        id:this.$route.params.id
      }
      axios
        .post(page_url, data, this.token)
        .then((res) => {
          this.fetchorders();
          this.$toaster.success("Order Comments added");
          this.message = '';
        })
        .catch(error => {
					this.error_message = '';
					this.errors = new ErrorHandling();
					if (error.response.status == 422) {
						if(error.response.data.status == 'Error'){
							this.error_message = error.response.data.message;
						}
						else{
							this.errors.record(error.response.data.errors);
						}
					}
				})
        .finally(() => (this.$parent.loading = false));
    },
    fetchDeliveryBoys() {
            this.$parent.loading = true;
            let page_url ="/api/admin/delivery_boy?limit=100&getDetail=1&getCategory=1";
            axios.get(page_url, this.token).then(res => {
                this.deliveryboys = res.data.data;
            })
            .finally(() => (this.$parent.loading = false));
    },
    fetchSetting() {
      var token = localStorage.getItem("token");
      const config = {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      };
      var responseData = {};
      axios
        .get("/api/admin/setting?type=is_purchased_setting", config)
        .then((res) => {
          for (var i = 0; i < res.data.data.length; i++) {
            Object.assign(responseData, {
              [res.data.data[i].setting_key]: res.data.data[i].setting_value,
            });
          }
         console.log(this.$parent.globalSettings.site_name , "settings gloabal")
          this.setting = responseData;
        })
        .finally(() => console.log("working"));
    },
  },
  mounted() { 
    
    var token = localStorage.getItem("token");
    this.token = {
      headers: {
        Authorization: `Bearer ${token}`,
      },
    };
    this.fetchorders();
    this.fetchDeliveryBoys();
    this.fetchSetting();

    
  },
  props: ["loading","globalSettings"],
};
</script>
