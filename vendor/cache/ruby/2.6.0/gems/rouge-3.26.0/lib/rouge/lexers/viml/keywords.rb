# -*- coding: utf-8 -*- #
# frozen_string_literal: true

# DO NOT EDIT
# This file is automatically generated by `rake builtins:viml`.
# See tasks/builtins/viml.rake for more info.

module Rouge
  module Lexers
    class VimL
      def self.keywords
        @keywords ||= {}.tap do |kw|
          kw[:command] = Set.new ["a", "ar", "args", "argl", "arglocal", "ba", "ball", "bm", "bmodified", "breaka", "breakadd", "bun", "bunload", "cabc", "cabclear", "cal", "call", "cc", "cf", "cfile", "changes", "cla", "clast", "cnf", "cnfile", "comc", "comclear", "cp", "cprevious", "cstag", "debugg", "debuggreedy", "deletl", "dep", "diffpu", "diffput", "dl", "dr", "drop", "ec", "em", "emenu", "ene", "enew", "files", "fini", "finish", "folddoc", "folddoclosed", "gr", "grep", "helpc", "helpclose", "his", "history", "il", "ilist", "isp", "isplit", "keepa", "l", "list", "laf", "lafter", "lbel", "lbelow", "lcscope", "lfdo", "lgrepa", "lgrepadd", "lma", "lo", "loadview", "lop", "lopen", "lua", "m", "move", "mes", "mkvie", "mkview", "nbc", "nbclose", "noh", "nohlsearch", "ol", "oldfiles", "pa", "packadd", "po", "pop", "prof", "profile", "pta", "ptag", "ptr", "ptrewind", "py3f", "py3file", "pythonx", "quita", "quitall", "redraws", "redrawstatus", "rew", "rewind", "rubyf", "rubyfile", "sIg", "sa", "sargument", "sba", "sball", "sbr", "sbrewind", "scl", "scscope", "sfir", "sfirst", "sgl", "sic", "sin", "sm", "smap", "snoreme", "spelld", "spelldump", "spellw", "spellwrong", "srg", "st", "stop", "stj", "stjump", "sunmenu", "syn", "tN", "tNext", "tabd", "tabdo", "tabm", "tabmove", "tabr", "tabrewind", "tch", "tchdir", "tf", "tfirst", "tlmenu", "tm", "tmenu", "to", "topleft", "tu", "tunmenu", "undol", "undolist", "up", "update", "vi", "visual", "vmapc", "vmapclear", "wa", "wall", "winp", "winpos", "wundo", "xme", "xr", "xrestore", "ab", "arga", "argadd", "argu", "argument", "bad", "badd", "bn", "bnext", "breakd", "breakdel", "bw", "bwipeout", "cabo", "cabove", "cat", "catch", "ccl", "cclose", "cfdo", "chd", "chdir", "cle", "clearjumps", "cnor", "comp", "compiler", "cpf", "cpfile", "cun", "delc", "delcommand", "deletp", "di", "display", "diffs", "diffsplit", "dli", "dlist", "ds", "dsearch", "echoe", "echoerr", "en", "endif", "eval", "filet", "fir", "first", "foldo", "foldopen", "grepa", "grepadd", "helpf", "helpfind", "i", "imapc", "imapclear", "iuna", "iunabbrev", "keepalt", "la", "last", "lan", "language", "lbo", "lbottom", "ld", "ldo", "lfir", "lfirst", "lh", "lhelpgrep", "lmak", "lmake", "loadk", "lp", "lprevious", "luado", "ma", "mark", "messages", "mod", "mode", "nbs", "nbstart", "nor", "omapc", "omapclear", "packl", "packloadall", "popu", "popup", "profd", "profdel", "ptf", "ptfirst", "pts", "ptselect", "pyx", "r", "read", "redrawt", "redrawtabline", "ri", "right", "rundo", "sIl", "sal", "sall", "sbf", "sbfirst", "sc", "scp", "se", "set", "sg", "sgn", "sie", "sip", "sme", "snoremenu", "spelli", "spellinfo", "spr", "sprevious", "sri", "sta", "stag", "stopi", "stopinsert", "sus", "suspend", "sync", "ta", "tag", "tabe", "tabedit", "tabn", "tabnext", "tabs", "tcld", "tcldo", "th", "throw", "tln", "tma", "tmap", "tp", "tprevious", "tunma", "tunmap", "unh", "unhide", "v", "vie", "view", "vne", "vnew", "wh", "while", "wn", "wnext", "wv", "wviminfo", "xmenu", "xunme", "abc", "abclear", "argd", "argdelete", "as", "ascii", "bd", "bdelete", "bo", "botright", "breakl", "breaklist", "cN", "cNext", "cad", "caddbuffer", "cb", "cbuffer", "cd", "cfir", "cfirst", "che", "checkpath", "clo", "close", "co", "copy", "con", "continue", "cq", "cquit", "cuna", "cunabbrev", "delel", "delf", "delfunction", "dif", "diffupdate", "difft", "diffthis", "do", "dsp", "dsplit", "echom", "echomsg", "endf", "endfunction", "ex", "filetype", "fix", "fixdel", "for", "gui", "helpg", "helpgrep", "ia", "in", "j", "join", "keepj", "keepjumps", "lab", "labove", "lat", "lc", "lcd", "le", "left", "lg", "lgetfile", "lhi", "lhistory", "lmapc", "lmapclear", "loadkeymap", "lpf", "lpfile", "luafile", "mak", "make", "mk", "mkexrc", "mz", "mzscheme", "new", "nore", "on", "only", "pc", "pclose", "pp", "ppop", "promptf", "promptfind", "ptj", "ptjump", "pu", "put", "py", "python", "pyxdo", "rec", "recover", "reg", "registers", "rightb", "rightbelow", "rv", "rviminfo", "sIn", "san", "sandbox", "sbl", "sblast", "scI", "scr", "scriptnames", "setf", "setfiletype", "sgI", "sgp", "sig", "sir", "smenu", "so", "source", "spellr", "spellrare", "sr", "srl", "star", "startinsert", "sts", "stselect", "sv", "sview", "syncbind", "tab", "tabf", "tabfind", "tabnew", "tags", "tclf", "tclfile", "tj", "tjump", "tlnoremenu", "tmapc", "tmapclear", "tr", "trewind", "u", "undo", "unl", "ve", "version", "vim", "vimgrep", "vs", "vsplit", "win", "winsize", "wp", "wprevious", "x", "xit", "xnoreme", "xunmenu", "abo", "aboveleft", "argdo", "au", "bel", "belowright", "bp", "bprevious", "bro", "browse", "cNf", "cNfile", "cadde", "caddexpr", "cbe", "cbefore", "cdo", "cg", "cgetfile", "checkt", "checktime", "cmapc", "cmapclear", "col", "colder", "conf", "confirm", "cr", "crewind", "cw", "cwindow", "delep", "dell", "diffg", "diffget", "dig", "digraphs", "doau", "e", "edit", "echon", "endfo", "endfor", "exi", "exit", "filt", "filter", "fo", "fold", "fu", "function", "gvim", "helpt", "helptags", "iabc", "iabclear", "inor", "ju", "jumps", "keepp", "keeppatterns", "lad", "laddexpr", "later", "lch", "lchdir", "lefta", "leftabove", "lgetb", "lgetbuffer", "ll", "lne", "lnext", "loc", "lockmarks", "lr", "lrewind", "lv", "lvimgrep", "marks", "mks", "mksession", "mzf", "mzfile", "nmapc", "nmapclear", "nos", "noswapfile", "opt", "options", "pe", "perl", "pre", "preserve", "promptr", "promptrepl", "ptl", "ptlast", "pw", "pwd", "pydo", "pyxfile", "red", "redo", "res", "resize", "ru", "runtime", "sI", "sIp", "sav", "saveas", "sbm", "sbmodified", "sce", "scripte", "scriptencoding", "setg", "setglobal", "sgc", "sgr", "sign", "sl", "sleep", "smile", "sor", "sort", "spellrepall", "srI", "srn", "startg", "startgreplace", "sun", "sunhide", "sw", "swapname", "syntime", "tabN", "tabNext", "tabfir", "tabfirst", "tabo", "tabonly", "tc", "tcl", "te", "tearoff", "tl", "tlast", "tlu", "tn", "tnext", "try", "una", "unabbreviate", "unlo", "unlockvar", "verb", "verbose", "vimgrepa", "vimgrepadd", "wN", "wNext", "winc", "wincmd", "wq", "xa", "xall", "xnoremenu", "xwininfo", "addd", "arge", "argedit", "bN", "bNext", "bf", "bfirst", "br", "brewind", "bufdo", "c", "change", "caddf", "caddfile", "cbel", "cbelow", "ce", "center", "cgetb", "cgetbuffer", "chi", "chistory", "cn", "cnext", "colo", "colorscheme", "cons", "const", "cs", "d", "delete", "deletel", "delm", "delmarks", "diffo", "diffoff", "dir", "doaut", "ea", "el", "else", "endt", "endtry", "exu", "exusage", "fin", "find", "foldc", "foldclose", "g", "h", "help", "hi", "if", "intro", "k", "lN", "lNext", "laddb", "laddbuffer", "lb", "lbuffer", "lcl", "lclose", "lex", "lexpr", "lgete", "lgetexpr", "lla", "llast", "lnew", "lnewer", "lockv", "lockvar", "ls", "lvimgrepa", "lvimgrepadd", "mat", "match", "mksp", "mkspell", "n", "next", "noa", "nu", "number", "ownsyntax", "ped", "pedit", "prev", "previous", "ps", "psearch", "ptn", "ptnext", "py3", "pyf", "pyfile", "q", "quit", "redi", "redir", "ret", "retab", "rub", "ruby", "sIc", "sIr", "sbN", "sbNext", "sbn", "sbnext", "scg", "scriptv", "scriptversion", "setl", "setlocal", "sge", "sh", "shell", "sil", "silent", "sla", "slast", "sn", "snext", "sp", "split", "spellrrare", "src", "srp", "startr", "startreplace", "sunme", "sy", "t", "tabc", "tabclose", "tabl", "tablast", "tabp", "tabprevious", "tcd", "ter", "terminal", "tlm", "tlunmenu", "tno", "tnoremap", "ts", "tselect", "undoj", "undojoin", "uns", "unsilent", "vert", "vertical", "viu", "viusage", "w", "write", "windo", "wqa", "wqall", "xmapc", "xmapclear", "xprop", "y", "yank", "al", "all", "argg", "argglobal", "b", "buffer", "bl", "blast", "brea", "break", "buffers", "ca", "caf", "cafter", "cbo", "cbottom", "cex", "cexpr", "cgete", "cgetexpr", "cl", "clist", "cnew", "cnewer", "com", "cope", "copen", "cscope", "debug", "deletep", "delp", "diffp", "diffpatch", "dj", "djump", "dp", "earlier", "elsei", "elseif", "endw", "endwhile", "f", "file", "fina", "finally", "foldd", "folddoopen", "go", "goto", "ha", "hardcopy", "hid", "hide", "ij", "ijump", "is", "isearch", "kee", "keepmarks", "lNf", "lNfile", "laddf", "laddfile", "lbe", "lbefore", "lcs", "lf", "lfile", "lgr", "lgrep", "lli", "llist", "lnf", "lnfile", "lol", "lolder", "lt", "ltag", "lw", "lwindow", "menut", "menutranslate", "mkv", "mkvimrc", "nb", "nbkey", "noautocmd", "o", "open", "p", "print", "perld", "perldo", "pro", "ptN", "ptNext", "ptp", "ptprevious", "py3do", "python3", "qa", "qall", "redr", "redraw", "retu", "return", "rubyd", "rubydo", "sIe", "sN", "sNext", "sb", "sbuffer", "sbp", "sbprevious", "sci", "scs", "sf", "sfind", "sgi", "si", "sim", "simalt", "smagic", "sno", "snomagic", "spe", "spellgood", "spellu", "spellundo", "sre", "srewind", "def", "endd", "enddef", "disa", "disassemble", "vim9", "vim9script", "imp", "import", "exp", "export"]
          kw[:option] = Set.new ["acd", "ambw", "arshape", "background", "ballooneval", "bex", "bl", "brk", "buftype", "cf", "cinkeys", "cmdwinheight", "com", "completeslash", "cpoptions", "cscoperelative", "csre", "cursorcolumn", "delcombine", "digraph", "eadirection", "emo", "equalprg", "expandtab", "fdls", "fex", "fileignorecase", "fml", "foldlevel", "formatexpr", "gcr", "go", "guifontset", "helpheight", "history", "hlsearch", "imaf", "ims", "includeexpr", "infercase", "iskeyword", "keywordprg", "laststatus", "lispwords", "lrm", "magic", "maxfuncdepth", "menuitems", "mm", "modifiable", "mousemodel", "mzq", "numberwidth", "opfunc", "patchexpr", "pfn", "pp", "printfont", "pumwidth", "pythonthreehome", "redrawtime", "ri", "rs", "sb", "scroll", "sect", "sft", "shellredir", "shiftwidth", "showmatch", "signcolumn", "smarttab", "sp", "spf", "srr", "startofline", "suffixes", "switchbuf", "ta", "tagfunc", "tbi", "term", "termwintype", "tgc", "titlelen", "toolbariconsize", "ttimeout", "ttymouse", "twt", "undofile", "varsofttabstop", "verbosefile", "viminfofile", "wak", "weirdinvert", "wig", "wildoptions", "winheight", "wm", "wrapscan", "ai", "anti", "autochdir", "backspace", "balloonevalterm", "bexpr", "bo", "browsedir", "casemap", "cfu", "cino", "cmp", "comments", "concealcursor", "cpp", "cscopetag", "cst", "cursorline", "dex", "dip", "eb", "emoji", "errorbells", "exrc", "fdm", "ff", "filetype", "fmr", "foldlevelstart", "formatlistpat", "gd", "gp", "guifontwide", "helplang", "hk", "ic", "imak", "imsearch", "incsearch", "insertmode", "isp", "km", "lazyredraw", "list", "ls", "makeef", "maxmapdepth", "mfd", "mmd", "modified", "mouses", "mzquantum", "nuw", "osfiletype", "patchmode", "ph", "preserveindent", "printheader", "pvh", "pyx", "regexpengine", "rightleft", "rtp", "sbo", "scrollbind", "sections", "sh", "shellslash", "shm", "showmode", "siso", "smc", "spc", "spl", "ss", "statusline", "suffixesadd", "sws", "tabline", "taglength", "tbidi", "termbidi", "terse", "tgst", "titleold", "top", "ttimeoutlen", "ttyscroll", "tx", "undolevels", "vartabstop", "vfile", "virtualedit", "warn", "wfh", "wildchar", "wim", "winminheight", "wmh", "write", "akm", "antialias", "autoindent", "backup", "balloonexpr", "bg", "bomb1", "bs", "cb", "ch", "cinoptions", "cms", "commentstring", "conceallevel", "cpt", "cscopetagorder", "csto", "cursorlineopt", "dg", "dir", "ed", "enc", "errorfile", "fcl", "fdn", "ffs", "fillchars", "fo", "foldmarker", "formatoptions", "gdefault", "grepformat", "guiheadroom", "hf", "hkmap", "icon", "imc", "imsf", "inde", "is", "isprint", "kmp", "lbr", "listchars", "lsp", "makeencoding", "maxmem", "mh", "mmp", "more", "mouseshape", "mzschemedll", "odev", "pa", "path", "pheader", "previewheight", "printmbcharset", "pvp", "pyxversion", "relativenumber", "rightleftcmd", "ru", "sbr", "scrollfocus", "secure", "shcf", "shelltemp", "shortmess", "showtabline", "sj", "smd", "spell", "splitbelow", "ssl", "stl", "sw", "sxe", "tabpagemax", "tagrelative", "tbis", "termencoding", "textauto", "thesaurus", "titlestring", "tpm", "ttm", "ttytype", "uc", "undoreload", "vb", "vi", "visualbell", "wb", "wfw", "wildcharm", "winaltkeys", "winminwidth", "wmnu", "writeany", "al", "ar", "autoread", "backupcopy", "bdir", "bh", "breakat", "bsdir", "cc", "charconvert", "cinw", "co", "compatible", "confirm", "crb", "cscopeverbose", "csverb", "cwh", "dict", "directory", "edcompatible", "encoding", "errorformat", "fcs", "fdo", "fic", "fixendofline", "foldclose", "foldmethod", "formatprg", "gfm", "grepprg", "guioptions", "hh", "hkmapp", "iconstring", "imcmdline", "imst", "indentexpr", "isf", "joinspaces", "kp", "lcs", "lm", "luadll", "makeprg", "maxmempattern", "mis", "mmt1", "mouse", "mouset", "mzschemegcdll", "oft", "packpath", "pdev", "pi", "previewpopup", "printmbfont", "pvw", "qe", "remap", "rl", "rubydll", "sc", "scrolljump", "sel", "shell", "shelltype", "shortname", "shq", "slm", "sn", "spellcapcheck", "splitright", "ssop", "stmp", "swapfile", "sxq", "tabstop", "tags", "tbs", "termguicolors", "textmode", "tildeop", "tl", "tr", "tty", "tw", "udf", "updatecount", "vbs", "viewdir", "vop", "wc", "wh", "wildignore", "wincolor", "winptydll", "wmw", "writebackup", "aleph", "arab", "autowrite", "backupdir", "bdlay", "bin", "breakindent", "bsk", "ccv", "ci", "cinwords", "cocu", "complete", "copyindent", "cryptmethod", "csl", "cuc", "debug", "dictionary", "display", "ef", "endofline", "esckeys", "fdc", "fdt", "fileencoding", "fixeol", "foldcolumn", "foldminlines", "fp", "gfn", "gtl", "guipty", "hi", "hkp", "ignorecase", "imd", "imstatusfunc", "indentkeys", "isfname", "js", "langmap", "linebreak", "lmap", "lw", "mat", "maxmemtot", "mkspellmem", "mod", "mousef", "mousetime", "nf", "ofu", "para", "penc", "pm", "previewwindow", "printoptions", "pw", "quoteescape", "renderoptions", "rlc", "ruf", "scb", "scrolloff", "selection", "shellcmdflag", "shellxescape", "showbreak", "si", "sm", "so", "spellfile", "spr", "st", "sts", "swapsync", "syn", "tag", "tagstack", "tc", "termwinkey", "textwidth", "timeout", "tm", "ts", "ttybuiltin", "twk", "udir", "updatetime", "vdir", "viewoptions", "vsts", "wcm", "whichwrap", "wildignorecase", "window", "winwidth", "wop", "writedelay", "allowrevins", "arabic", "autowriteall", "backupext", "belloff", "binary", "breakindentopt", "bt", "cd", "cin", "clipboard", "cole", "completefunc", "cot", "cscopepathcomp", "cspc", "cul", "deco", "diff", "dy", "efm", "eol", "et", "fde", "fen", "fileencodings", "fk", "foldenable", "foldnestmax", "fs", "gfs", "gtt", "guitablabel", "hid", "hl", "im", "imdisable", "imstyle", "indk", "isi", "key", "langmenu", "lines", "lnr", "lz", "matchpairs", "mco", "ml", "modeline", "mousefocus", "mp", "nrformats", "omnifunc", "paragraphs", "perldll", "pmbcs", "printdevice", "prompt", "pythondll", "rdt", "report", "rnu", "ruler", "scf", "scrollopt", "selectmode", "shellpipe", "shellxquote", "showcmd", "sidescroll", "smartcase", "softtabstop", "spelllang", "sps", "sta", "su", "swb", "synmaxcol", "tagbsearch", "tal", "tcldll", "termwinscroll", "tf", "timeoutlen", "to", "tsl", "ttyfast", "tws", "ul", "ur", "ve", "vif", "vts", "wcr", "wi", "wildmenu", "winfixheight", "wiv", "wrap", "ws", "altkeymap", "arabicshape", "aw", "backupskip", "beval", "bk", "bri", "bufhidden", "cdpath", "cindent", "cm", "colorcolumn", "completeopt", "cp", "cscopeprg", "csprg", "culopt", "def", "diffexpr", "ea", "ei", "ep", "eventignore", "fdi", "fenc", "fileformat", "fkmap", "foldexpr", "foldopen", "fsync", "gfw", "guicursor", "guitabtooltip", "hidden", "hlg", "imactivatefunc", "imi", "inc", "inex", "isident", "keymap", "langnoremap", "linespace", "loadplugins", "ma", "matchtime", "mef", "mle", "modelineexpr", "mousehide", "mps", "nu", "opendevice", "paste", "pex", "pmbfn", "printencoding", "pt", "pythonhome", "re", "restorescreen", "ro", "rulerformat", "scl", "scs", "sessionoptions", "shellquote", "shiftround", "showfulltag", "sidescrolloff", "smartindent", "sol", "spellsuggest", "sr", "stal", "sua", "swf", "syntax", "tagcase", "tb", "tenc", "termwinsize", "tfu", "title", "toolbar", "tsr", "ttym", "twsl", "undodir", "ut", "verbose", "viminfo", "wa", "wd", "wic", "wildmode", "winfixwidth", "wiw", "wrapmargin", "ww", "ambiwidth", "ari", "awa", "balloondelay", "bevalterm", "bkc", "briopt", "buflisted", "cedit", "cink", "cmdheight", "columns", "completepopup", "cpo", "cscopequickfix", "csqf", "cursorbind", "define", "diffopt", "ead", "ek", "equalalways", "ex", "fdl", "fencs", "fileformats", "flp", "foldignore", "foldtext", "ft", "ghr", "guifont", "helpfile", "highlight", "hls", "imactivatekey", "iminsert", "include", "inf", "isk", "keymodel", "langremap", "lisp", "lpl", "macatsui", "maxcombine", "menc", "mls", "modelines", "mousem", "msm", "number", "operatorfunc", "pastetoggle", "pexpr", "popt", "printexpr", "pumheight", "pythonthreedll", "readonly", "revins", "rop", "runtimepath", "scr", "noacd", "noallowrevins", "noantialias", "noarabic", "noarshape", "noautoread", "noaw", "noballooneval", "nobevalterm", "nobk", "nobreakindent", "nocf", "nocindent", "nocopyindent", "nocscoperelative", "nocsre", "nocuc", "nocursorcolumn", "nodelcombine", "nodigraph", "noed", "noemo", "noeol", "noesckeys", "noexpandtab", "nofic", "nofixeol", "nofoldenable", "nogd", "nohid", "nohkmap", "nohls", "noicon", "noimc", "noimdisable", "noinfercase", "nojoinspaces", "nolangremap", "nolinebreak", "nolnr", "nolrm", "nomacatsui", "noml", "nomod", "nomodelineexpr", "nomodified", "nomousef", "nomousehide", "nonumber", "noopendevice", "nopi", "nopreviewwindow", "nopvw", "norelativenumber", "norestorescreen", "nori", "norl", "noro", "noru", "nosb", "noscb", "noscrollbind", "noscs", "nosft", "noshelltemp", "noshortname", "noshowfulltag", "noshowmode", "nosm", "nosmartindent", "nosmd", "nosol", "nosplitbelow", "nospr", "nossl", "nostartofline", "noswapfile", "nota", "notagrelative", "notbi", "notbs", "noterse", "notextmode", "notgst", "notimeout", "noto", "notr", "nottybuiltin", "notx", "noundofile", "novisualbell", "nowarn", "noweirdinvert", "nowfw", "nowildignorecase", "nowinfixheight", "nowiv", "nowrap", "nowrite", "nowritebackup", "noai", "noaltkeymap", "noar", "noarabicshape", "noautochdir", "noautowrite", "noawa", "noballoonevalterm", "nobin", "nobl", "nobri", "noci", "nocompatible", "nocp", "nocscopetag", "nocst", "nocul", "nocursorline", "nodg", "noea", "noedcompatible", "noemoji", "noequalalways", "noet", "noexrc", "nofileignorecase", "nofk", "nofs", "nogdefault", "nohidden", "nohkmapp", "nohlsearch", "noignorecase", "noimcmdline", "noincsearch", "noinsertmode", "nojs", "nolazyredraw", "nolisp", "noloadplugins", "nolz", "nomagic", "nomle", "nomodeline", "nomodifiable", "nomore", "nomousefocus", "nonu", "noodev", "nopaste", "nopreserveindent", "noprompt", "noreadonly", "noremap", "norevins", "norightleft", "nornu", "nors", "noruler", "nosc", "noscf", "noscrollfocus", "nosecure", "noshellslash", "noshiftround", "noshowcmd", "noshowmatch", "nosi", "nosmartcase", "nosmarttab", "nosn", "nospell", "nosplitright", "nosr", "nosta", "nostmp", "noswf", "notagbsearch", "notagstack", "notbidi", "notermbidi", "notextauto", "notf", "notildeop", "notitle", "notop", "nottimeout", "nottyfast", "noudf", "novb", "nowa", "nowb", "nowfh", "nowic", "nowildmenu", "nowinfixwidth", "nowmnu", "nowrapscan", "nowriteany", "nows", "noakm", "noanti", "noarab", "noari", "noautoindent", "noautowriteall", "nobackup", "nobeval", "nobinary", "nobomb1", "nobuflisted", "nocin", "noconfirm", "nocrb", "nocscopeverbose", "nocsverb", "nocursorbind", "nodeco", "nodiff", "noeb", "noek", "noendofline", "noerrorbells", "noex", "nofen", "nofixendofline", "nofkmap", "nofsync", "noguipty", "nohk", "nohkp", "noic", "noim", "noimd", "noinf", "nois", "nolangnoremap", "nolbr", "nolist", "nolpl", "noma", "nomh", "invacd", "invallowrevins", "invantialias", "invarabic", "invarshape", "invautoread", "invaw", "invballooneval", "invbevalterm", "invbk", "invbreakindent", "invcf", "invcindent", "invcopyindent", "invcscoperelative", "invcsre", "invcuc", "invcursorcolumn", "invdelcombine", "invdigraph", "inved", "invemo", "inveol", "invesckeys", "invexpandtab", "invfic", "invfixeol", "invfoldenable", "invgd", "invhid", "invhkmap", "invhls", "invicon", "invimc", "invimdisable", "invinfercase", "invjoinspaces", "invlangremap", "invlinebreak", "invlnr", "invlrm", "invmacatsui", "invml", "invmod", "invmodelineexpr", "invmodified", "invmousef", "invmousehide", "invnumber", "invopendevice", "invpi", "invpreviewwindow", "invpvw", "invrelativenumber", "invrestorescreen", "invri", "invrl", "invro", "invru", "invsb", "invscb", "invscrollbind", "invscs", "invsft", "invshelltemp", "invshortname", "invshowfulltag", "invshowmode", "invsm", "invsmartindent", "invsmd", "invsol", "invsplitbelow", "invspr", "invssl", "invstartofline", "invswapfile", "invta", "invtagrelative", "invtbi", "invtbs", "invterse", "invtextmode", "invtgst", "invtimeout", "invto", "invtr", "invttybuiltin", "invtx", "invundofile", "invvisualbell", "invwarn", "invweirdinvert", "invwfw", "invwildignorecase", "invwinfixheight", "invwiv", "invwrap", "invwrite", "invwritebackup", "invai", "invaltkeymap", "invar", "invarabicshape", "invautochdir", "invautowrite", "invawa", "invballoonevalterm", "invbin", "invbl", "invbri", "invci", "invcompatible", "invcp", "invcscopetag", "invcst", "invcul", "invcursorline", "invdg", "invea", "invedcompatible", "invemoji", "invequalalways", "invet", "invexrc", "invfileignorecase", "invfk", "invfs", "invgdefault", "invhidden", "invhkmapp", "invhlsearch", "invignorecase", "invimcmdline", "invincsearch", "invinsertmode", "invjs", "invlazyredraw", "invlisp", "invloadplugins", "invlz", "invmagic", "invmle", "invmodeline", "invmodifiable", "invmore", "invmousefocus", "invnu", "invodev", "invpaste", "invpreserveindent", "invprompt", "invreadonly", "invremap", "invrevins", "invrightleft", "invrnu", "invrs", "invruler", "invsc", "invscf", "invscrollfocus", "invsecure", "invshellslash", "invshiftround", "invshowcmd", "invshowmatch", "invsi", "invsmartcase", "invsmarttab", "invsn", "invspell", "invsplitright", "invsr", "invsta", "invstmp", "invswf", "invtagbsearch", "invtagstack", "invtbidi", "invtermbidi", "invtextauto", "invtf", "invtildeop", "invtitle", "invtop", "invttimeout", "invttyfast", "invudf", "invvb", "invwa", "invwb", "invwfh", "invwic", "invwildmenu", "invwinfixwidth", "invwmnu", "invwrapscan", "invwriteany", "invws", "invakm", "invanti", "invarab", "invari", "invautoindent", "invautowriteall", "invbackup", "invbeval", "invbinary", "invbomb1", "invbuflisted", "invcin", "invconfirm", "invcrb", "invcscopeverbose", "invcsverb", "invcursorbind", "invdeco", "invdiff", "inveb", "invek", "invendofline", "inverrorbells", "invex", "invfen", "invfixendofline", "invfkmap", "invfsync", "invguipty", "invhk", "invhkp", "invic", "invim", "invimd", "invinf", "invis", "invlangnoremap", "invlbr", "invlist", "invlpl", "invma", "invmh", "t_8b", "t_AB", "t_al", "t_bc", "t_BE", "t_ce", "t_cl", "t_Co", "t_Cs", "t_CV", "t_db", "t_DL", "t_EI", "t_F2", "t_F4", "t_F6", "t_F8", "t_fs", "t_IE", "t_k1", "t_k2", "t_K3", "t_K4", "t_K5", "t_K6", "t_K7", "t_K8", "t_K9", "t_kb", "t_KB", "t_kd", "t_KD", "t_ke", "t_KE", "t_KF", "t_KG", "t_kh", "t_KH", "t_kI", "t_KI", "t_KJ", "t_KK", "t_kl", "t_KL", "t_kN", "t_kP", "t_kr", "t_ks", "t_ku", "t_le", "t_mb1", "t_md", "t_me", "t_mr", "t_ms", "t_nd", "t_op", "t_PE", "t_PS", "t_RB", "t_RC", "t_RF", "t_Ri", "t_RI", "t_RS", "t_RT", "t_RV", "t_Sb", "t_SC", "t_se", "t_Sf", "t_SH", "t_Si", "t_SI", "t_so", "t_sr", "t_SR", "t_ST", "t_te", "t_Te", "t_TE", "t_ti", "t_TI", "t_ts", "t_Ts", "t_u7", "t_ue", "t_us", "t_ut", "t_vb", "t_ve", "t_vi", "t_vs", "t_VS", "t_WP", "t_WS", "t_xn", "t_xs", "t_ZH", "t_ZR", "t_8f", "t_AF", "t_AL", "t_BD", "t_cd", "t_Ce", "t_cm", "t_cs", "t_CS", "t_da", "t_dl", "t_EC", "t_F1", "t_F3", "t_F5", "t_F7", "t_F9", "t_GP", "t_IS", "t_K1", "t_k3", "t_k4", "t_k5", "t_k6", "t_k7", "t_k8", "t_k9", "t_KA", "t_kB", "t_KC", "t_kD"]
          kw[:auto] = Set.new ["BufAdd", "BufDelete", "BufFilePost", "BufHidden", "BufNew", "BufRead", "BufReadPost", "BufUnload", "BufWinEnter", "BufWinLeave", "BufWipeout", "BufWrite", "BufWriteCmd", "BufWritePost", "BufWritePre", "CmdlineChanged", "CmdlineEnter", "CmdlineLeave", "CmdUndefined", "CmdwinEnter", "CmdwinLeave", "ColorScheme", "ColorSchemePre", "CompleteChanged", "CompleteDone", "CompleteDonePre", "CursorHold", "CursorHoldI", "CursorMoved", "CursorMovedI", "DiffUpdated", "DirChanged", "EncodingChanged", "ExitPre", "FileAppendCmd", "FileAppendPost", "FileAppendPre", "FileChangedRO", "FileChangedShell", "FileChangedShellPost", "FileEncoding", "FileReadCmd", "FileReadPost", "FileReadPre", "FileType", "FileWriteCmd", "FileWritePost", "FileWritePre", "FilterReadPost", "FilterReadPre", "FilterWritePost", "FilterWritePre", "FocusGained", "FocusLost", "FuncUndefined", "GUIEnter", "GUIFailed", "InsertChange", "InsertCharPre", "InsertEnter", "InsertLeave", "MenuPopup", "OptionSet", "QuickFixCmdPost", "QuickFixCmdPre", "QuitPre", "RemoteReply", "SafeState", "SafeStateAgain", "SessionLoadPost", "ShellCmdPost", "ShellFilterPost", "SourceCmd", "SourcePost", "SourcePre", "SpellFileMissing", "StdinReadPost", "StdinReadPre", "SwapExists", "Syntax", "TabClosed", "TabEnter", "TabLeave", "TabNew", "TermChanged", "TerminalOpen", "TerminalWinOpen", "TermResponse", "TextChanged", "TextChangedI", "TextChangedP", "TextYankPost", "User", "VimEnter", "VimLeave", "VimLeavePre", "VimResized", "WinEnter", "WinLeave", "WinNew", "BufCreate", "BufEnter", "BufFilePre", "BufLeave", "BufNewFile", "BufReadCmd", "BufReadPre"]
          kw[:function] = Set.new ["abs", "appendbufline", "asin", "assert_fails", "assert_notmatch", "balloon_gettext", "bufadd", "bufname", "byteidx", "char2nr", "ch_evalexpr", "ch_log", "ch_readraw", "cindent", "complete_check", "cosh", "deepcopy", "diff_hlID", "eval", "exists", "feedkeys", "findfile", "fnamemodify", "foldtextresult", "get", "getchar", "getcmdtype", "getenv", "getftype", "getmatches", "getreg", "gettagstack", "getwinvar", "has_key", "histget", "iconv", "inputlist", "interrupt", "isnan", "job_start", "js_encode", "libcall", "list2str", "log", "mapcheck", "matchdelete", "max", "nextnonblank", "popup_atcursor", "popup_dialog", "popup_getoptions", "popup_notification", "prevnonblank", "prop_add", "prop_type_add", "pum_getpos", "rand", "reg_recording", "remote_foreground", "remove", "round", "screencol", "searchdecl", "serverlist", "setenv", "setpos", "settagstack", "sign_define", "sign_placelist", "sin", "sound_playevent", "split", "str2list", "strftime", "strpart", "submatch", "synID", "systemlist", "taglist", "term_dumpload", "term_getcursor", "term_getstatus", "term_sendkeys", "term_setsize", "test_autochdir", "test_getvalue", "test_null_dict", "test_null_string", "test_scrollbar", "test_unknown", "timer_start", "toupper", "type", "values", "winbufnr", "win_findbuf", "winheight", "winline", "winsaveview", "winwidth", "acos", "argc", "assert_beeps", "assert_false", "assert_report", "balloon_show", "bufexists", "bufnr", "byteidxcomp", "ch_canread", "ch_evalraw", "ch_logfile", "ch_sendexpr", "clearmatches", "complete_info", "count", "delete", "echoraw", "eventhandler", "exp", "filereadable", "float2nr", "foldclosed", "foreground", "getbufinfo", "getcharmod", "getcmdwintype", "getfontname", "getimstatus", "getmousepos", "getregtype", "getwininfo", "glob", "haslocaldir", "histnr", "indent", "inputrestore", "invert", "items", "job_status", "json_decode", "libcallnr", "listener_add", "log10", "match", "matchend", "min", "nr2char", "popup_beval", "popup_filter_menu", "popup_getpos", "popup_setoptions", "printf", "prop_clear", "prop_type_change", "pumvisible", "range", "reltime", "remote_peek", "rename", "rubyeval", "screenpos", "searchpair", "setbufline", "setfperm", "setqflist", "setwinvar", "sign_getdefined", "sign_undefine", "sinh", "sound_playfile", "sqrt", "str2nr", "strgetchar", "strptime", "substitute", "synIDattr", "tabpagebuflist", "tan", "term_dumpwrite", "term_getjob", "term_gettitle", "term_setansicolors", "term_start", "test_feedinput", "test_ignore_error", "test_null_job", "test_option_not_set", "test_setmouse", "test_void", "timer_stop", "tr", "undofile", "virtcol", "wincol", "win_getid", "win_id2tabwin", "winnr", "win_screenpos", "wordcount", "add", "argidx", "assert_equal", "assert_inrange", "assert_true", "balloon_split", "buflisted", "bufwinid", "call", "ch_close", "ch_getbufnr", "ch_open", "ch_sendraw", "col", "confirm", "cscope_connection", "deletebufline", "empty", "executable", "expand", "filewritable", "floor", "foldclosedend", "funcref", "getbufline", "getcharsearch", "getcompletion", "getfperm", "getjumplist", "getpid", "gettabinfo", "getwinpos", "glob2regpat", "hasmapto", "hlexists", "index", "inputsave", "isdirectory", "job_getchannel", "job_stop", "json_encode", "line", "listener_flush", "luaeval", "matchadd", "matchlist", "mkdir", "or", "popup_clear", "popup_filter_yesno", "popup_hide", "popup_settext", "prompt_setcallback", "prop_find", "prop_type_delete", "py3eval", "readdir", "reltimefloat", "remote_read", "repeat", "screenattr", "screenrow", "searchpairpos", "setbufvar", "setline", "setreg", "sha256", "sign_getplaced", "sign_unplace", "sort", "sound_stop", "srand", "strcharpart", "stridx", "strridx", "swapinfo", "synIDtrans", "tabpagenr", "tanh", "term_getaltscreen", "term_getline", "term_gettty", "term_setapi", "term_wait", "test_garbagecollect_now", "test_null_blob", "test_null_list", "test_override", "test_settime", "timer_info", "timer_stopall", "trim", "undotree", "visualmode", "windowsversion", "win_gettype", "win_id2win", "winrestcmd", "win_splitmove", "writefile", "and", "arglistid", "assert_equalfile", "assert_match", "atan", "browse", "bufload", "bufwinnr", "ceil", "ch_close_in", "ch_getjob", "ch_read", "ch_setoptions", "complete", "copy", "cursor", "did_filetype", "environ", "execute", "expandcmd", "filter", "fmod", "foldlevel", "function", "getbufvar", "getcmdline", "getcurpos", "getfsize", "getline", "getpos", "gettabvar", "getwinposx", "globpath", "histadd", "hlID", "input", "inputsecret", "isinf", "job_info", "join", "keys", "line2byte", "listener_remove", "map", "matchaddpos", "matchstr", "mode", "pathshorten", "popup_close", "popup_findinfo", "popup_menu", "popup_show", "prompt_setinterrupt", "prop_list", "prop_type_get", "pyeval", "readfile", "reltimestr", "remote_send", "resolve", "screenchar", "screenstring", "searchpos", "setcharsearch", "setloclist", "settabvar", "shellescape", "sign_jump", "sign_unplacelist", "sound_clear", "spellbadword", "state", "strchars", "string", "strtrans", "swapname", "synstack", "tabpagewinnr", "tempname", "term_getansicolors", "term_getscrolled", "term_list", "term_setkill", "test_alloc_fail", "test_garbagecollect_soon", "test_null_channel", "test_null_partial", "test_refcount", "test_srand_seed", "timer_pause", "tolower", "trunc", "uniq", "wildmenumode", "win_execute", "win_gotoid", "winlayout", "winrestview", "win_type", "xor", "append", "argv", "assert_exception", "assert_notequal", "atan2", "browsedir", "bufloaded", "byte2line", "changenr", "chdir", "ch_info", "ch_readblob", "ch_status", "complete_add", "cos", "debugbreak", "diff_filler", "escape", "exepath", "extend", "finddir", "fnameescape", "foldtext", "garbagecollect", "getchangelist", "getcmdpos", "getcwd", "getftime", "getloclist", "getqflist", "gettabwinvar", "getwinposy", "has", "histdel", "hostname", "inputdialog", "insert", "islocked", "job_setoptions", "js_decode", "len", "lispindent", "localtime", "maparg", "matcharg", "matchstrpos", "mzeval", "perleval", "popup_create", "popup_findpreview", "popup_move", "pow", "prompt_setprompt", "prop_remove", "prop_type_list", "pyxeval", "reg_executing", "remote_expr", "remote_startserver", "reverse", "screenchars", "search", "server2client", "setcmdpos", "setmatches", "settabwinvar", "shiftwidth", "sign_place", "simplify", "soundfold", "spellsuggest", "str2float", "strdisplaywidth", "strlen", "strwidth", "synconcealed", "system", "tagfiles", "term_dumpdiff", "term_getattr", "term_getsize", "term_scrape", "term_setrestore"]
        end
      end
    end
  end
end