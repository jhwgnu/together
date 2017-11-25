<?php
$lang->wiki='위키';
$lang->not_exist='존재하지 않는 문서입니다. 권한이 있으시면, 문서를 만들 수 있습니다.';
$lang->cmd_create='문서 생성';
$lang->cmd_wiki_list='목록';
$lang->cmd_wiki_info='위키 정보';
$lang->use_comment='댓글 사용';
$lang->cmd_view_document_list='문서 목록';
$lang->cmd_view_document_tree='계층 보기';
$lang->about_use_comment='댓글을 활성화하거나 비활성화할 수 있습니다';
$lang->contributors='공헌자';
$lang->notice_old_revision='이전 버전을 보고 계십니다';
$lang->restore='복원';
$lang->arrange_list='목록 갱신';
$lang->about_arrange_list='데이터 이전하였거나 의도하지 않은 경우에 의해 제목 Alias가 설정되지 않아서 위키 글을 찾아갈 수 없는 문서들을 일괄적으로 제목 Alias를 설정해줍니다.';
$lang->hide_tree='계층 숨기기';
$lang->show_tree='계층 보이기';
$lang->content='문서 내용';
$lang->diff='차이';
$lang->markup_type='마크업 유형';
$lang->markdown='마크다운';
$lang->googlecode_markup='구글코드위키';
$lang->mediawiki_markup='미디어위키';
$lang->xe_wiki_markup='XE위키';
$lang->about_markup_type='내용추가를 위한 HTML 마크업은 XE 편집기를 사용합니다. 마크다운, 미디어위키, 구글코드와 같은 짧은 태그 형식의 위키는 단순한 문자를 사용합니다.';
$lang->revision='리비젼';
$lang->current='현재';
$lang->leave_comment='코멘트 남기기';
$lang->cancel='취소';
$lang->xewiki_no_results='검색 결과가 없습니다.';
$lang->search_results='검색 결과';
$lang->too_many_results='검색 결과가 많습니다. 검색어를 조금 더 구체적으로 넣어주세요.';
$lang->results_number='질의에 대한 검색 결과.';
$lang->title_lang_bar='언어';
$lang->title_breadcrumbs_bar='경로';
$lang->new_document='새 문서';
$lang->home_page='처음으로';
$lang->histories='역사';
$lang->wiki_search_title='위키 검색';
$lang->write_form_title='제목:';
$lang->write_form_alias='단축주소:';
$lang->create_first_page_title='학과 위키에 오신 것을 환영합니다!';
$lang->create_first_page_description='생성된 문서가 없습니다. 새로운 페이지를 생성하세요.';
$lang->create_first_page_markdown_help='
You haven\'t created any pages yet so here\'s a few tips to get you started.

You should now that XpressEngine Wiki now uses [Markdown](http://daringfireball.net/projects/markdown/) as its default syntax for adding content.

### What is Markdown?

Here\'s how it\'s presented on its website:

> _Markdown is a text-to-HTML conversion tool for web writers. Markdown allows you to write using an easy-to-read, easy-to-write plain text format, then convert it to structurally valid XHTML (or HTML)._

But what does this mean? Let\'s see some examples!

### Markdown in action

#### Styling and headers

You can write in *italics* just by surrounding you words with stars like \*this\*. Make them \*\*double\*\* and you\'ll get **bold**.

For headings, like the one above use

\# Heading 1

\## Heading 2

\#\#\# Heading 3

or even simpler, divide content with many dashes:

     ---------------------------

#### Links

Just add an url directly in you content and it will be directly linked: http://www.xpressengine.org.

If you also want to add a description use a bracket combination, just like on [the official website](http://daringfireball.net/projects/markdown/syntax#link).

You can also link to pages inside the same wiki, but instead of using an url you have to specify the document alias - \[some description\]\(page_alias\) and you\'re done!

### Lists

\- Use a minus sign for a bullet

\+ Or plus sign

\* Or an asterisk


\1. Numbered lists are easy

\2. Markdown keeps track of the numbers for you

\7. So this will be item 3.

### More info

This page was just a quick intro to get you started. For more help, take a look at:

+ PHP Markdown extra - http://michelf.com/projects/php-markdown/extra/
+ Markdown\'s official reference - http://daringfireball.net/projects/markdown/syntax
		';
$lang->top_of_page='상단으로';
$lang->comment='댓글';
$lang->translate_page_into='페이지를 %s로 번역';
$lang->you_are_viewing='현재 %s로 보고 있습니다.';
$lang->view_this_page_in='%s로 이페이지 보기';
$lang->pages_that_link_to_this='이 문서를 참조하는 페이지:';
$lang->links_in_this_page='이 페이지의 링크:';
$lang->confirm_document_override='글을 쓰는동안 다른 누군가에 의해 문서가 갱신됐습니다. 당신의 변경사항으로 덮어 쓸까요?';
$lang->wiki_language_help='위키 문법';
$lang->markdown_help='
		# Heading 1 #
		## Heading 2 ##
		### Heading 3 ##############

		*italic*, **bold**
		escape \*

		- Use a minus sign for a bullet list
		+ Or plus sign
		* Or an asterisk
		1. Numbered lists are easy
		2. Markdown keeps track of the numbers for you
		7. So this will be item 3.

		Links:
		&nbsp;&nbsp;  http://site/page
		&nbsp;&nbsp;  Add description: [Page description](http://site/page)
		&nbsp;&nbsp;  Link to pages in the same wiki: [Page description](page_alias)
		Smart links:
		&nbsp;&nbsp;  Add a name or id to your link: [Here\'s a nice link][1]
		&nbsp;&nbsp;  And then detail it in the page footer for clarity: [1]: www.google.com

		Images:
		![Image description](url_to_image)

        Line breaks
        - Add an empty line
		- Add two spaces the end of a line

		For more help, take a look at:
		<ul>
		<li> PHP Markdown extra - <a href=http://michelf.com/projects/php-markdown/extra/ target=_blank>http://michelf.com/projects/php-markdown/extra/</a>
		<li> Markdown\'s official reference - <a href=http://daringfireball.net/projects/markdown/syntax target=_blank>http://daringfireball.net/projects/markdown/syntax</a>
		</ul>
		';
$lang->googlecode_markup_help='
		=Heading1=
		==Heading2==
		===Heading3===

		*bold*     _italic_
		`inline code`
		escape: `*`

		Indent lists 2 spaces:
		* bullet item
		# numbered list

		{{{
		verbatim code block
		}}}

		Horizontal rule
		----

		WikiWordLink
		[http://domain/page label]
		http://domain/page

		|| table || cells ||

		For more help, take a look at <a href=http://code.google.com/p/support/wiki/WikiSyntax target=_blank>http://code.google.com/p/support/wiki/WikiSyntax</a>
		';
$lang->mediawiki_markup_help='
		== Heading2 ==
		=== Heading3 ===

		\'\'\'bold\'\'\'     \'\'italic\'\'
		&lt;nowiki&gt;Escape wiki markup&lt;/nowiki&gt;

		Lists
		* bullet item
		** deeper level
		# numbered list

		Horizontal rule
		----

		Links
		[[Internal_link]]
		[[Internal_link | You should use page alias]]

		http://domain/page
		[http://domain/page label]

		Table:
		{|
		|Orange
		|Apple
		|-
		|Bread
		|Pie
		|-
		|Butter
		|Ice cream
		|}

		For more help, take a look at <a href=http://www.mediawiki.org/wiki/Help:Formatting target=_blank>http://www.mediawiki.org/wiki/Help:Formatting</a>
		';
$lang->xe_wiki_markup_help='XE 위키 마크업은 XE HTML 편집기를 사용합니다. XE 위키의 지난 버전에 존재하던 방식입니다.';
$lang->diff_no_differences='두 버전 사이에 차이가 없습니다.';
$lang->diff_old_version='낡은 버전';
$lang->diff_new_version='새 버전';
$lang->compare='비교';
$lang->about_use_status='글 작성 시 선택할 수 있는 상태를 지정해주세요.';
