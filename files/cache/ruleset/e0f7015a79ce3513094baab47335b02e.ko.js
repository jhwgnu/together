(function($,v){
v=xe.getApp('validator')[0];if(!v)return;

v.cast('ADD_FILTER',['insertPackage', {'mid':{required:true},'category_srl':{required:true,rule:'number'},'title':{required:true},'path':{required:true},'license':{required:true},'homepage':{required:true,rule:'url'},'description':{required:true}}]);
v.cast('ADD_MESSAGE',['mid','모듈 이름']);
v.cast('ADD_MESSAGE',['category_srl','분류']);
v.cast('ADD_MESSAGE',['title','제목']);
v.cast('ADD_MESSAGE',['path','경로']);
v.cast('ADD_MESSAGE',['license','<p>Copyright (C) NAVER &lt;http://www.navercorp.com&gt;</p> <p>\"XpressEngine (XE)\"은 자유 소프트웨어이며, 오픈 소스 프로젝트로 개발되고 있습니다. 자세한 내용은 아래 링크를 참조하시기 바랍니다.</p> <ul> <li>공식 사이트: <a href=\"http://www.xpressengine.com\">http://www.xpressengine.com</a></li> <li>공식 저장소: <a href=\"http://github.com/xpressengine\">http://github.com/xpressengine</a></li> </ul> <p>\"XpressEngine (XE)\"은 자유 소프트웨어입니다. 소프트웨어의 피양도자는 자유 소프트웨어 재단이 공표한 GNU 약소 일반 공중 사용 허가서 2.1판 또는 그 이후 판을 임의로 선택해서, 그 규정에 따라 소프트웨어를 개작하거나 재배포할 수 있습니다.</p> <p>이 소프트웨어는 유용하게 사용될 수 있으리라는 희망에서 배포되고 있지만, 특정한 목적에 맞는 적합성 여부나 판매용으로 사용할 수 있으리라는 묵시적인 보증을 포함한 어떠한 형태의 보증도 제공하지 않습니다. 보다 자세한 사항에 대해서는 GNU 약소 일반 공중 사용 허가서를 참고하시기 바랍니다.</p> <p>GNU 약소 일반 공중 사용 허가서는 이 라이브러리와 함께 제공됩니다. 만약, 이 문서가 누락되어 있다면 자유 소프트웨어 재단으로 문의하시기 바랍니다. (자유 소프트웨어 재단: Free Software Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA)</p> <ul> <li>한국어 번역문 (비공식) : <a href=\"http://korea.gnu.org/people/chsong/copyleft/lgpl.ko.html\" target=\"_blank\">GNU Lesser General Public License, version 2.1</a></li> <li>영문 (공식 원본) : <a href=\"http://www.gnu.org/licenses/old-licenses/lgpl-2.1.html\" target=\"_blank\">GNU Lesser General Public License, version 2.1</a></li> </ul>']);
v.cast('ADD_MESSAGE',['homepage','홈페이지']);
v.cast('ADD_MESSAGE',['description','설명']);
v.cast('ADD_MESSAGE',['isnull','%s 값은 필수입니다.']);
v.cast('ADD_MESSAGE',['outofrange','%s의 글자 수를 맞추어 주세요.']);
v.cast('ADD_MESSAGE',['equalto','%s이(가) 잘못되었습니다.']);
v.cast('ADD_MESSAGE',['invalid','%s의 값이 올바르지 않습니다.']);
v.cast('ADD_MESSAGE',['invalid_email','%s의 값은 올바른 메일 주소가 아닙니다.']);
v.cast('ADD_MESSAGE',['invalid_userid','%s의 값은 영문, 숫자, _만 가능하며 첫 글자는 영문이어야 합니다.']);
v.cast('ADD_MESSAGE',['invalid_user_id','%s의 값은 영문, 숫자, _만 가능하며 첫 글자는 영문이어야 합니다.']);
v.cast('ADD_MESSAGE',['invalid_homepage','%s의 형식이 잘못되었습니다.(예: http://www.xpressengine.com)']);
v.cast('ADD_MESSAGE',['invalid_url','%s의 형식이 잘못되었습니다.(예: http://www.xpressengine.com)']);
v.cast('ADD_MESSAGE',['invalid_korean','%s의 형식이 잘못되었습니다. 한글로만 입력해야 합니다.']);
v.cast('ADD_MESSAGE',['invalid_korean_number','%s의 형식이 잘못되었습니다. 한글과 숫자로만 입력해야 합니다.']);
v.cast('ADD_MESSAGE',['invalid_alpha','%s의 형식이 잘못되었습니다. 영문으로만 입력해야 합니다.']);
v.cast('ADD_MESSAGE',['invalid_alpha_number','%s의 형식이 잘못되었습니다. 영문과 숫자로만 입력해야 합니다.']);
v.cast('ADD_MESSAGE',['invalid_mid','%s의 형식이 잘못되었습니다. 첫 글자는 영문으로 시작해야 하며 \'영문+숫자+_\'로만 입력해야 합니다.']);
v.cast('ADD_MESSAGE',['invalid_number','%s의 형식이 잘못되었습니다. 숫자로만 입력해야 합니다.']);
v.cast('ADD_MESSAGE',['invalid_float','%s의 형식이 잘못되었습니다. 실수로만 입력해야 합니다.']);
})(jQuery);