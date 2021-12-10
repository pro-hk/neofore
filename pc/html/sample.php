<? include("../include/header.html") ?>
<div id="subContentsWrap">
  <div class="subContents">
    <div class="breadCrumb">
      <ul>
        <li>
          <a href=""><span class="material-icons"> home </span></a>
        </li>
        <li><a href="">고객지원</a></li>
        <li><a href="">샘플신청</a></li>
      </ul>
    </div>
    <h2 class="subTitle">고객 지원</h2>
    <nav id="lnb">
      <h3 class="hidden">local navigation bar</h3>
      <ul>
        <li><a href="faq.html">FAQ</a></li>
        <li><a href="online.html">온라인 문의</a></li>
        <li><a href="contact.html">담당자 연락처</a></li>
        <li><a href="">제품 카탈로그</a></li>
        <li class="on"><a href="sample.html">샘플신청</a></li>
      </ul>
    </nav>
    <div class="boardBox">
      <div class="info">
        <p>신청 내용에 개인 정보를 기재하시는 경우, 답변 완료 후 임의로 삭제될 수 있사오니 개인 정보 기재는 삼가주세요.</p>
        <p><span class="require">*</span> 항목은 필수 입력항목입니다.</p>
      </div>
      <table class="board write">
        <colgroup>
          <col style="width: 10%" />
          <col style="width: 40%" />
          <col style="width: 10%" />
          <col style="width: 40%" />
        </colgroup>
        <tbody>
          <tr>
            <th scope="row">회사명<span class="require">*</span></th>
            <td><input type="text" /></td>
            <th scope="row" class="even">이름<span class="require">*</span></th>
            <td><input type="text" /></td>
          </tr>
          <tr>
            <th scope="row">휴대전화<span class="require">*</span></th>
            <td><input type="text" /></td>
            <th class="even">이메일<span class="require">*</span></th>
            <td><input type="text" /></td>
          </tr>
          <tr>
            <th>샘플종류<span class="require">*</span></th>
            <td colspan="3">
              <select name="" id="">
                <option value="">샘플종류를 선택하세요.</option>
                <option value="" class="opt">네오포레 CUP</option>
                <option value="" class="opt">네오포레 STRAW</option>
                <option value="" class="opt">네오포레 완충재</option>
              </select>
            </td>
          </tr>
          <tr>
            <th>주소<span class="require">*</span></th>
            <td colspan="3" class="address">
              <div class="addr01">
                <input type="text" id="postcode" class="readonly" placeholder="우편번호" readonly />
                <button onclick="searchPostCode();"><span class="material-icons"> search </span>우편번호 검색</button>
              </div>
              <div class="addr02">
                <input type="text" id="roadAddress" class="readonly" placeholder="주소" readonly />
                <input type="text" class="etc" placeholder="나머지 주소 입력" />
              </div>
            </td>
          </tr>
          <tr>
            <th>제목<span class="require">*</span></th>
            <td colspan="3"><input type="text" /></td>
          </tr>
          <tr>
            <th class="content">내용<span class="require">*</span></th>
            <td colspan="3"><textarea name="" id="" cols="30" rows="10"></textarea></td>
          </tr>
          <tr>
            <th>첨부파일</th>
            <td colspan="3">
              <div class="flex">
                <!-- <input type="text" class="address" placeholder="총 5MB 문서와 이미지 파일만 첨부 가능합니다." /> -->
                <input type="file" />
              </div>
            </td>
          </tr>
        </tbody>
      </table>
      <div class="agreeBox">
        <div class="agree">
          <div class="show">
            <label class="checkbox">
              <input type="checkbox" id="" />
              <span class="label">개인정보 수집에 동의합니다.</span>
            </label>
            <button>전문 보기</button>
          </div>
          <div>
            <label class="checkbox">
              <input type="checkbox" id="" />
              <span class="label">만 14세 이상입니다.</span>
            </label>
          </div>
        </div>
        <button type="submit">확인</button>
      </div>
    </div>
  </div>
</div>
<script>
  //본 예제에서는 도로명 주소 표기 방식에 대한 법령에 따라, 내려오는 데이터를 조합하여 올바른 주소를 구성하는 방법을 설명합니다.
  function searchPostCode() {
    new daum.Postcode({
      oncomplete: function (data) {
        // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

        // 도로명 주소의 노출 규칙에 따라 주소를 표시한다.
        // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
        var roadAddr = data.roadAddress; // 도로명 주소 변수
        var extraRoadAddr = ""; // 참고 항목 변수

        // 법정동명이 있을 경우 추가한다. (법정리는 제외)
        // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
        if (data.bname !== "" && /[동|로|가]$/g.test(data.bname)) {
          extraRoadAddr += data.bname;
        }
        // 건물명이 있고, 공동주택일 경우 추가한다.
        if (data.buildingName !== "" && data.apartment === "Y") {
          extraRoadAddr += extraRoadAddr !== "" ? ", " + data.buildingName : data.buildingName;
        }
        // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
        if (extraRoadAddr !== "") {
          extraRoadAddr = " (" + extraRoadAddr + ")";
        }

        // 우편번호와 주소 정보를 해당 필드에 넣는다.
        document.getElementById("postcode").value = data.zonecode;
        document.getElementById("roadAddress").value = roadAddr;
        // document.getElementById("jibunAddress").value = data.jibunAddress;

        // 참고항목 문자열이 있을 경우 해당 필드에 넣는다.
        // if (roadAddr !== "") {
        //   document.getElementById("sample4_extraAddress").value = extraRoadAddr;
        // } else {
        //   document.getElementById("sample4_extraAddress").value = "";
        // }

        // var guideTextBox = document.getElementById("guide");
        // // 사용자가 '선택 안함'을 클릭한 경우, 예상 주소라는 표시를 해준다.
        // if (data.autoRoadAddress) {
        //   var expRoadAddr = data.autoRoadAddress + extraRoadAddr;
        //   guideTextBox.innerHTML = "(예상 도로명 주소 : " + expRoadAddr + ")";
        //   guideTextBox.style.display = "block";
        // } else if (data.autoJibunAddress) {
        //   var expJibunAddr = data.autoJibunAddress;
        //   guideTextBox.innerHTML = "(예상 지번 주소 : " + expJibunAddr + ")";
        //   guideTextBox.style.display = "block";
        // } else {
        //   guideTextBox.innerHTML = "";
        //   guideTextBox.style.display = "none";
        // }
      },
    }).open();
  }
</script>
<? include("../include/footer.html") ?>
